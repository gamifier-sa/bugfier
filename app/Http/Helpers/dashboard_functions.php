<?php

use App\Http\Classes\AppSetting;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Invoice;

if ( !function_exists('isRtl') ) {

    function isArabic() : bool
    {
        return getLocale() === "ar";
    }

}

if ( !function_exists('isDarkMode') ) {

    function isDarkMode() : bool
    {
        return session('theme_mode') === "dark";
    }

}

if(!function_exists('uploadImage')){

    function uploadImage($request, $model = '' ){
        $model        = Str::plural($model);
        $model        = Str::ucfirst($model);
        $path         = "/Images/".$model;
        $originalName =  $request->getClientOriginalName(); // Get file Original Name
        $imageName    = str_replace(' ','','tempelet_' . time() . $originalName);  // Set Image name
        $request->storeAs($path, $imageName,'public');
        return $imageName;
    }
}


if(!function_exists('deleteImage')){

    function deleteImage($imageName, $model){
        $model = Str::plural($model);
        $model = Str::ucfirst($model);

        if ($imageName != 'default.png'){
            $path = "/Images/" . $model . '/' .$imageName;
            Storage::disk('public')->delete($path);
        }
    }
}

if(!function_exists('getImagePath')){

    function getImagePath( $imageName , $directory = null , $defaultImage = 'default.jpg'  ): string
    {
        $imagePath = public_path('/storage/Images/'.'/' . $directory . '/' . $imageName);

        if ( $imageName && $directory &&  $imagePath ) // check if the directory is null or the image doesn't exist
        {
            return asset('/storage/Images') .'/' . $directory . '/' . $imageName;
        }
        else{
            return asset('storage/Images/' . $defaultImage);
        }

    }

}

if(!function_exists('getImageSettingsPath')){

    function getImageSettingsPath( $imageName , $directory = null , $defaultImage = 'default.jpg'  ): string
    {
        $imagePath = public_path('/storage/Images/'.'/' . $directory . '/' . $imageName);

        if ( $imageName && $directory &&  $imagePath ) // check if the directory is null or the image doesn't exist
        {
            return asset('/storage/Images') .'/' . $directory . '/' . $imageName;
        }
        else{
            return asset('placeholder_images/' . $defaultImage);
        }

    }

}



if(!function_exists('isTabActive')){

    function isTabActive($path , $queryParam = '') : string
    {
        if ( request()->segment(2)  === $path && $queryParam == request('type') )
            return 'active';
        else
            return '';
    }
}

if(!function_exists('getLocale')){

    function getLocale() : string
    {
        return app()->getLocale();
    }
}

if(!function_exists('settings')){

    function settings(): AppSetting
    {
        return new AppSetting();
    }

}


if(!function_exists('getRelationWithColumns')){

    function getRelationWithColumns($relations) : array
    {
        $relationsWithColumns = [];

        foreach ( $relations as $relation => $columns)
        {
            array_push($relationsWithColumns , $relation . ":" . implode(",",$columns));
        }

        return $relationsWithColumns;
    }

}

if(!function_exists('getDateRangeArray')){ // takes 'Y-m-d - Y-m-d' and returns [ Y-m-d 00:00:00 , Y-m-d 23:59:59 ]

    function getDateRangeArray($dateRange) : array
    {
        $dateRange = explode( ' - ' , $dateRange );

        return [ $dateRange[0] . ' 00:00:00' , $dateRange[1] . ' 23:59:59'  ];
    }

}

if(!function_exists('currency')){

    function currency() : string
    {
        return ' ' . __( settings()->get('currency') );
    }

}

if(!function_exists('getStatusObject')){

    function getStatusObject($nameEn)
    {
        return array_values( array_filter( settings()->get('orders_statuses') ?? [] , fn( $status ) => $status['name_en'] == $nameEn ) )[0] ?? [ "name_ar" => $nameEn , "name_en" => $nameEn, "color" => "#219ed4"];
    }

}


if(!function_exists('getCoordinates')){ // takes google map url and return the coordinates , formatting must be https://www.google.com/maps/?q="lat""lng"

    function getCoordinates($mapUrl) : array
    {
        try {

            $mapUrlLatLng   = substr( parse_url($mapUrl, PHP_URL_QUERY) , 2);
            $lat      = explode( ',' , $mapUrlLatLng )[0];
            $lng      = explode( ',' , $mapUrlLatLng )[1];

            return [$lat , $lng ];

        }catch (Exception $exception){
            dd('formatting is incorrect');
        }
    }

}

if ( !function_exists('getDataTable'))
{
    /**
     * Display a listing of the resource.
     * column is array with we select it from table
     */

    function getDataTable(Model $model, $orsFilters = [], $andsFilters = [], $relations = [], $searchingColumns = null, $withTrashed = false, $orderBy = [], $group = null, $Between = [], $subRelation = [])
    {
        $columns               =  $searchingColumns ?? $model->getConnection()->getSchemaBuilder()->getColumnListing($model->getTable());
        $relationsWithColumns  =  getRelationWithColumns($relations); // this fn takes [ brand => [ id , name ] ] then returns : brand:id,name to use it in with clause

        /** Get the request parameters **/
        $params = request()->all();
        /** Set the current page **/
        $page = $params['page'] ?? 1;

        /** Set the number of items per page **/
        $perPage = $params['per_page'] ?? 10;

        // set passed filters from controller if exist
        if (!$withTrashed)
            $model   = $model->query()->with($relationsWithColumns);
        else
            $model   = $model->query()->onlyTrashed()->with($relationsWithColumns);


        /** Get the count before search **/
        $itemsBeforeSearch = $model->count();

        // general search
        if (isset($params['search']['value'])) {

            if (str_starts_with($params['search']['value'], '0'))
                $params['search']['value'] = substr($params['search']['value'], 1);

            /** search in the original table **/
            foreach ($columns as $column)
                array_push($orsFilters, [$column, 'LIKE', "%" . $params['search']['value'] . "%"]);
        }

        // filter search
        if ($itemsBeforeSearch == $model->count() && $params ) {

            $searchingKeys = collect($params['columns'])->transform(function ($entry) {
                return $entry['search']['value'] != null && $entry['search']['value'] != 'all' ? Arr::only($entry, ['data', 'name', 'search']) : null; // return just columns which have search values
            })->whereNotNull()->values();

            /** if request has filters like status **/
            if ($searchingKeys->count() > 0) {
                /** search in the original table **/
                foreach ($searchingKeys as $column) {
                    if (!($column['name'] == 'created_at' or  $column['name'] == 'date'))
                        array_push($andsFilters, [$column['name'], '=',  $column['search']['value']]);
                    else {
                        if (!str_contains($column['search']['value'], ' - ')) // if date isn't range ( single date )
                            $model->orWhereDate($column['name'], $column['search']['value']);
                        else
                            $model->orWhereBetween($column['name'], getDateRangeArray($column['search']['value']));
                    }
                }
            }
        }else{
            return $model->get();
        }

        $model   = $model->where(function ($query) use ($orsFilters) {
            foreach ($orsFilters as  $filter)
                $query->orWhere([$filter]);
        });
        if ($andsFilters)
            $model->where($andsFilters);
        if ($Between && $Between[1] != null && $Between[2] != null) {

            $model->WhereBetween($Between[0], [$Between[1], $Between[2]]);
        } elseif ($Between && $Between[1] != null) {
            $model->whereDate($Between[0], '>=', $Between[1]);
        } elseif ($Between && $Between[2] != null) {
            $model->whereDate($Between[0], '<=', $Between[2]);
        }

        if ($group) {
            $model->groupBy($group);
        }
        if ($subRelation) {
            $model->with($group);
        }

        if (!empty($orderBy) && count($orderBy) > 0 && !empty(request()['order'])) {
            $columnName = request()['columns'][(int) request()['order'][0]['column']]['data'];
            if ($columnName) {
                $model->orderBy($columnName, $orderBy[0]['dir']);
            }
        }


        $response = [
            "recordsTotal"    => $model->count(),
            "recordsFiltered" => $model->count(),
            'data' => $model->skip(($page - 1) * $perPage)->take($perPage)->get()
        ];
        return $response;
    }
}

if ( !function_exists('getModelData') ) {

    function getModelData(Model $model, $orsFilters = [], $andsFilters = [], $relations = [], $searchingColumns = null, $withTrashed = false, $group = null, $Between = [], $subRelation = [], bool $searchByRelation = false): array
    {
        /** Get the request parameters **/
        $params = request()->all();
        $isAndOrExist = count($orsFilters) > 0 && count($andsFilters) > 0;

        $relationsWithSearchedColumn =
            relationsWithSearchedColumn($relations, $searchingColumns, $params['search']['value']);

        $columns =
            $searchingColumns ?? $model->getConnection()->getSchemaBuilder()->getColumnListing($model->getTable());
        $relationsWithColumns =
            getRelationWithColumns($relations); // this fn takes [ brand => [ id , name ] ] then returns : brand:id,name to use it in with clause

        /** Set the current page **/
        $page = $params['page'] ?? 1;

        /** Set the number of items per page **/
        $perPage = $params['per_page'] ?? 10;

        // set passed filters from controller if exist
        $builder = $model->query();

        if (!$withTrashed)
            $model = $builder->with($relationsWithColumns);
        else
            $model = $builder->onlyTrashed()->with($relationsWithColumns);


        /** Get the count before search **/
        $itemsBeforeSearch = $model->count();

        // general search
        if (isset($params['search']['value'])) {

            if (str_starts_with($params['search']['value'], '0'))
                $params['search']['value'] = substr($params['search']['value'], 1);

            /** search in the original table **/
            foreach ($columns as $column)
                $orsFilters[] = [$column, 'LIKE', "%" . $params['search']['value'] . "%"];

        }


        // filter search
        if ($itemsBeforeSearch == $model->count()) {

            $searchingKeys = collect($params['columns'])->transform(function ($entry) {

                return $entry['search']['value'] != null && $entry['search']['value'] != 'all' ? Arr::only($entry, ['data',
                                                                                                                    'name',
                                                                                                                    'search']) : null; // return just columns which have search values

            })->whereNotNull()->values();


            /** if request has filters like status **/
            if ($searchingKeys->count() > 0) {

                /** search in the original table **/
                foreach ($searchingKeys as $column) {
                    if (!($column['name'] == 'created_at' or $column['name'] == 'date'))
                        $andsFilters[] = [$column['name'], '=', $column['search']['value']];
                    else {
                        if (!str_contains($column['search']['value'], ' - ')) // if date isn't range ( single date )
                            $model->orWhereDate($column['name'], $column['search']['value']);
                        else
                            $model->orWhereBetween($column['name'], getDateRangeArray($column['search']['value']));
                    }
                }

            }

        }

        if (!$searchByRelation) {
            $model = $model->orWhere(function ($query) use ($orsFilters) {
                foreach ($orsFilters as $filter)
                    $query->orWhere([$filter]);
            });
        }

        if ($searchByRelation) {
            foreach ($relationsWithSearchedColumn as $key => $clause) {
                $model = $model->whereHas($key, $clause);
            }
        } else {
            foreach ($relationsWithSearchedColumn as $key => $clause) {
                $model = $model->orWhereHas($key, $clause);
            }
        }


        if ($andsFilters) {
            $model = $model->where($andsFilters);

        }


        if (count($Between) > 1) {

            $model->whereBetween($Between[0], $Between[1]);
        }


        if ($group) {
            $model->groupBy($group);
            $countAfterGrouping = $model->get()->count();
        }


        if ($subRelation) {
            $model->with($group);
        }
        $model->orderBy('created_at', 'DESC');
        $response = [
            "recordsTotal"    => $model->count(),
            "recordsFiltered" => $countAfterGrouping ?? $model->count(),
            'data'            => $model->skip(($page - 1) * $perPage)->take($perPage)->get()
        ];

        return $response;
    }

    function relationsWithSearchedColumn(mixed $relations, array|null &$searchingColumns, string|null $searchedValue) : array
    {
        if ($searchingColumns == null) return [];

        $withQuery = [];
        $relationsSearch = [];
        foreach ($searchingColumns as $key => $column){
            $result = explode('.', $column);
            if(count($result) == 2){
                unset($searchingColumns[$key]);
                if (count($searchingColumns) == 0) $searchingColumns= null;
                $relationsSearch[$result[0]] = $result[1];
            }
        }

        foreach ($relations as $key => $values){
            $closures = function ($query) use ($key, $values,$relationsSearch, $searchedValue) {
//                $query = $query->select($values);
                if(array_key_exists($key, $relationsSearch) && $searchedValue){
                    $query->where($relationsSearch[$key], 'LIKE', '%'.$searchedValue.'%' );
                }
                return $query;
            };
            $withQuery[$key ] = $closures;
        }


        return $withQuery;
    }

}

if (!function_exists('prefixHoverShow')) {
    function prefixHoverShow($prefixName): string
    {
        $routeName = explode(".", request()->route()->getName());
        return $routeName[1] == $prefixName ? 'hover show' : '';
    }
}

if (!function_exists('prefixShow')) {
    function prefixShow($prefixName, bool $isFullPath = false)
    {
        if($isFullPath) return request()->fullUrlIs($prefixName)? 'show' : '';
      return request()->routeIs($prefixName) ? 'show' : '';
    }
}

/**
 * push firebase notification .
 * Author : Khaled & Baraa
 * created By Khaled @ 15-06-2021
 * Development By baraa @ 21-03-2023
 */
if(!function_exists('pushNotification')){
    function pushNotification($patient = null){
        if (!$patient){
            /** Get Admin Last Notification **/
            $notification = Employee::first()->unreadNotifications->first();
            /** push notification only to interest employees if guard is employee**/
            $tokensList   = Employee::whereHas('roles', function (Builder $query) use ($notification) {
                $query->where('label', employeeRole($notification->type));
            })->whereNotNull('device_token')->pluck('device_token')->all();
        }else{
            $tokensList = [$patient->device_token];
            $notification = $patient->unreadNotifications->first();
        }

        $SERVER_API_KEY = serverKey();

        $data = [
            "registration_ids"    => $tokensList,
            "notification"        => [
                "alert_title" => $notification->data['title'],
                "title"       => $notification->data['title'],
                "date"        => $notification->created_at->diffForHumans(),
                "alert_icon"  => $notification->data['icon'] ,
                "icon"        => asset(settings()->get('logo_path')),
                "class"       => $notification->data['class'],
                "url"         => $notification->data['url'],
                "id"          => $notification->id,
            ]
        ];

        $dataString = json_encode($data);
        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];
        return Http::withHeaders($headers)->post('https://fcm.googleapis.com/fcm/send', [$dataString]);


//        $ch = curl_init();
//
//        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
//        curl_setopt($ch, CURLOPT_POST, true);
//        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
//        curl_exec($ch);
//
//        return $ch;
    }
}


if(!function_exists('serverKey')){
    function serverKey(){
        return "AAAA4aN7mQ0:APA91bH2crrFOJLJt28hsyEgVbycqXN6MBqiSbGshszGr2YvL9HrIRenf1-LYYGpk-xmW3TAmmWHrS30ZQasD3ED6vq0tYv558zxtQ3opm82hyh3V2DwNF1vf6Xn394M1Ge2c_Zmo9yw";
    }
}

if(!function_exists('employeeRole')){
    function employeeRole($notificationType){
        switch ($notificationType){
            case 'App\Notifications\WaitingLabNotification':
                return 'Lab';
            case 'App\Notifications\ResultToDoctor':
                return 'Doctor';
            case 'App\Notifications\HomeVisitNotification':
                return 'Receptionist';
            default :
                return 'Super Admin';
        }
    }
}

if(!function_exists('getVisitAnalytics')){
    function getVisitAnalytics()
    {
        $visitsDaily   = Invoice::whereDate('created_at',Carbon::now()->format('Y-m-d'))->groupBy(DB::raw('Date(created_at)'))->get()->count();
        $visitsMonthly = Invoice::whereDate('created_at','>=',Carbon::now()->subMonth()->format('Y-m-d'))->groupBy(DB::raw('Date(created_at)'))->get()->count();
        $visitsYearly  = Invoice::whereDate('created_at','>=',Carbon::now()->subYear()->format('Y-m-d'))->groupBy(DB::raw('Date(created_at)'))->get()->count();

        return ['visits_daily'   => $visitsDaily, 'visits_monthly' => $visitsMonthly, 'visits_yearly'  => $visitsYearly];

    }
}

if(!function_exists('getResultsStatus')) {
    function getResultsStatus($request)
    {

        $resultsPendingDaily = ResultStatusDaily(1);
        $resultsFinishedDaily = ResultStatusDaily(2);

        $resultsPendingMonthly = Result::whereDate('created_at', '>=', Carbon::now()->format('Y-m-d')->subMonth()->format('Y-m-d'))->where('result', 1)->get()->count();
        $resultsFinishedMonthly = Result::whereDate('created_at', '>=', Carbon::now()->format('Y-m-d')->subMonth()->format('Y-m-d'))->where('result', 2)->get()->count();

        $resultsPendingYearly = Result::whereDate('created_at', '>=', Carbon::now()->format('Y-m-d')->subYear()->format('Y-m-d'))->where('result', 1)->get()->count();
        $resultsFinishedYearly = Result::whereDate('created_at', '>=', Carbon::now()->format('Y-m-d')->subYear()->format('Y-m-d'))->where('result', 2)->get()->count();

    }
}
/**
 * @return mixed
 */
if(!function_exists('ResultStatusDaily')) {
    function ResultStatusDaily($status)
    {
        return Result::whereDate('created_at', Carbon::now()->format('Y-m-d'))->where('result', $status)->get()->count();
    }
}

if(!function_exists('getTotalInvoicesPrice')) {
    function getTotalInvoicesPrice($request)
    {
        $pendingInvoicePriceDaily   = Invoice::whereDate('created_at',Carbon::now()->format('Y-m-d'))->where('status',1)->sum('total_price');
        $finishedInvoicePriceDaily   = Invoice::whereDate('created_at',Carbon::now()->format('Y-m-d'))->where('status',2)->sum('total_price');

        $pendingInvoicePriceMonthly  = Invoice::whereDate('created_at','>=',Carbon::now()->format('Y-m-d')->subMonth()->format('Y-m-d'))->where('status',1)->sum('total_price');
        $finishedInvoicePriceMonthly = Invoice::whereDate('created_at','>=',Carbon::now()->format('Y-m-d')->subMonth()->format('Y-m-d'))->where('status',2)->sum('total_price');

        $pendingInvoicePriceYearly   = Invoice::whereDate('created_at','>=',Carbon::now()->format('Y-m-d')->subYear()->format('Y-m-d'))->where('status',1)->sum('total_price');
        $finishedInvoicePriceYearly  = Invoice::whereDate('created_at','>=',Carbon::now()->format('Y-m-d')->subYear()->format('Y-m-d'))->where('status',2)->sum('total_price');
    }
}
if(!function_exists('getTotalInvoicesStatus')) {
    function getTotalInvoicesStatus($request)
    {

        $invoicePendingDaily    = Invoice::whereDate('created_at',Carbon::now()->format('Y-m-d'))->where('status',1)->select('id')->get()->count();
        $invoiceFinishedDaily   = Invoice::whereDate('created_at',Carbon::now()->format('Y-m-d'))->where('status',2)->select('id')->get()->count();

        $invoicePendingMonthly  = Invoice::whereDate('created_at','>=',Carbon::now()->format('Y-m-d')->subMonth()->format('Y-m-d'))->where('status',1)->select('id')->get()->count();
        $invoiceFinishedMonthly = Invoice::whereDate('created_at','>=',Carbon::now()->format('Y-m-d')->subMonth()->format('Y-m-d'))->where('status',2)->select('id')->get()->count();

        $invoicePendingYearly   = Invoice::whereDate('created_at','>=',Carbon::now()->format('Y-m-d')->subYear()->format('Y-m-d'))->where('status',1)->select('id')->get()->count();
        $invoiceFinishedYearly  = Invoice::whereDate('created_at','>=',Carbon::now()->format('Y-m-d')->subYear()->format('Y-m-d'))->where('status',2)->select('id')->get()->count();
    }
}

if(!function_exists('numtoks')) {
    function numtoks($number)
    {
        $units = ['', 'K', 'M', 'B', 'T'];
        for ($i = 0; $number >= 1000; $i++) {
            $number /= 1000;
        }
        return round($number, 1) . $units[$i];
    }
}
