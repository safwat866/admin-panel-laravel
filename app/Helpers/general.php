<?php
use App\Models\Currency;
use App\Services\CacheService;
use Illuminate\Support\Facades\App;

function numbersRange($start, $end, $option)
{
    //0 2 4 Even Odd 1 3 5
    $numbers = [];
    for ($number = $start; $number <= $end; $number++) {
        if ($number % 2 == 0 && $option == 'even') {
            array_push($numbers, $number);
        } elseif ($number % 2 != 0 && $option == 'odd') {
            array_push($numbers, $number);
        } elseif ($option == 'all') {
            array_push($numbers, $number);
        }
    }
    return $numbers;
}

if (!function_exists('currency')) {
    function currency()
    {
        return 'AED';
    }
}

if (!function_exists('phoneValidateCountry')) {
    function phoneValidateCountry($number = '')
    {

        $newNumbers = range(0, 9);
        $arabic = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
        $number = str_replace($arabic, $newNumbers, $number);
        $code = '';

        $url = public_path('json/CountryCodes.json');
        $codes_json = json_decode(file_get_contents($url, true));
        $codes = array_map(function ($country) {
            return [
                'code' => $country->dial_code,
                'length' => strlen($country->dial_code),
            ];
        }, $codes_json);

        $codes = collect($codes)->groupBy('length');

        $codes_group_length = $codes;

        foreach ($codes_group_length as $length => $value) {
            $length_collect = collect($value);
            $l = (int) $length;
            $cur_code = substr($number, 0, $l);

            if ($length_collect->where('code', $cur_code)->first()) {
                $code = $cur_code;
                $number = substr($number, $l);
                break;
            }
        }

        return [
            'code' => $code,
            'number' => $number,
        ];
    }
}

function uniqueRandomNumbersWithinRange($min, $max, $quantity, $option, $length, $purchased_tickets, $start_with = null, $end_with = null, $page = 1, $shuffle = false)
{
    $numbers = numbersRange($min, $max, $option, $start_with, $end_with);
    $formatted_numbers = [];
    foreach ($numbers as $number) {
        $number = (string) $number;
        $number_len = strlen($number);
        if ($number_len < $length) {
            $diff = $length - $number_len;
            for ($i = 0; $i < $diff; $i++) {
                $number = '0' . $number;
            }
        }
        if ($start_with) {
            if (!str_starts_with($number, $start_with)) {
                continue;
            }
        }
        if ($end_with) {
            if (!str_ends_with($number, $end_with)) {
                continue;
            }
        }
        if (count($purchased_tickets) > 0) {
            if (in_array($number, $purchased_tickets)) {
                continue;
            }
        }
        array_push($formatted_numbers, $number);
    }

    if ($shuffle == 'false') {
        $offset = ($page * $quantity) - $quantity;
        $current_formatted_numbers = array_slice($formatted_numbers, $offset, $quantity);
    } else {
        shuffle($formatted_numbers);
        $current_formatted_numbers = array_slice($formatted_numbers, 0, $quantity);
    }

    return ['current_formatted_numbers' => $current_formatted_numbers, 'overall_count' => count($formatted_numbers)];

}

function convert2english($string)
{
    $newNumbers = range(0, 9);
    $arabic = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
    $string = str_replace($arabic, $newNumbers, $string);
    return $string;
}

function fixPhone($string = null)
{
    if (!$string) {
        return null;
    }

    $result = convert2english($string);
    $result = ltrim($result, '00');
    $result = ltrim($result, '0');
    $result = ltrim($result, '+');
    return $result;
}

function Translate($text, $lang)
{

    $api = 'trnsl.1.1.20190807T134850Z.8bb6a23ccc48e664.a19f759906f9bb12508c3f0db1c742f281aa8468';

    $url = file_get_contents('https://translate.yandex.net/api/v1.5/tr.json/translate?key=' . $api
        . '&lang=ar' . '-' . $lang . '&text=' . urlencode($text));
    $json = json_decode($url);
    return $json->text[0];

}

function getYoutubeVideoId($youtubeUrl)
{
    preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/",
        $youtubeUrl, $videoId);
    return $youtubeVideoId = isset($videoId[1]) ? $videoId[1] : "";
}

function locale()
{
    return App()->getLocale();
}

function generateRandomCode()
{
    return '123456';
    return rand(111111, 999999);
}

if (!function_exists('locales')) {
    function locales()
    {
        return ['ar', 'en'];
    }
}

if (!function_exists('defaultLocale')) {
    function defaultLocale()
    {
        return 'ar';
    }
}

//converts currency to home default currency
if (!function_exists('convert_price')) {
    function convert_price($price, $currency_code = 'AED')
    {
        $currency = Currency::where('code', $currency_code)->first();
        $price = floatval($price) * floatval($currency->exchange_rate);

        return str_replace(",", "", number_format($price, 2));
    }
}
if (!function_exists('generateRandomString')) {
    function generateRandomString($length = 10)
    {
        return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
    }
}

if (!function_exists('perPage')) {
    function perPage()
    {
        return 20;
    }
}

if (!function_exists('getMessageUser')) {
    function getMessageUser($room, $message)
    {
        $createable = ($room->createable_type . '-' . $room->createable_id) == ($message->senderable_type . '-' . $message->senderable_id);
        $user = $message->senderable;
        $user->createable = $createable;
        return $user;
    }
}

if (!function_exists('filterEnum')) {
    function filterEnum($cases)
    {
        $rows = [];
        foreach ($cases as $case) {
            $rows[] = [
                'name' => __('admin.' . $case->value),
                'id' => $case->value,
            ];
        }
        return $rows;
    }
}

if (!function_exists('settings')) {

    function settings($key, $local = false, $defaultReturn = '')
    {
        $settings = (new CacheService())->Settings();
        if ($local) {
            return array_key_exists($key . '_' . locale(), $settings) ? $settings[$key . '_' . locale()] : '';
        }
        return array_key_exists($key, $settings) ? $settings[$key] : $defaultReturn;
    }
}

if (!function_exists('log_error')) {
    function log_error($exception = null)
    {
        $trace = debug_backtrace();
        $class = $trace[1]['class'];
        $function = $trace[1]['function'];
        info('there is error at class ===> ' . $class . ' , function ===> ' . $function . ' //// the exception ===========> ', [
            'message' => $exception->getMessage(),
            'file' => [
                'file' => $exception?->getFile(),
                'line' => $exception?->getLine(),
            ],
        ]);
        return [
            'key' => 'fail',
            'msg' => __('apis.server_error'),
        ];
    }
}

if (!function_exists('authGuard')) {
    function authGuard($guard = 'web')
    {
        return Auth::guard($guard)->user();
    }
}

if (!function_exists('allowedImagesMimeTypes')) {
    function allowedImagesMimeTypes()
    {
        $extension = [
            'image/gif', 'image/jpeg', 'image/png', 'image/swf', 'image/psd', 'image/bmp',
            'image/tiff', 'image/tiff', 'image/jpc', 'image/jp2', 'image/jpf', 'image/jb2', 'image/swc',
            'image/aiff', 'image/wbmp', 'image/xbm', 'image/webp', 'application/octet-stream',
        ];

        return $extension;
    }

    if (!function_exists('mimesImage')) {
        function mimesImage()
        {
            $extension = [
                'gif', 'jpeg', 'png', 'swf', 'psd', 'bmp',
                'tiff', 'tiff', 'jpc', 'jp2', 'jpf', 'jb2', 'swc',
                'aiff', 'wbmp', 'xbm', 'webp',
            ];

            return implode(',', $extension);
        }
    }

}
