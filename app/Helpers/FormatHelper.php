<?php
namespace App\Helpers;

class FormatHelper{
    public static function toIndonesianDateFormat($date){
        $months = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];

        $dates = explode('-', $date);
        return $dates[0]. ' ' . $months[(int) $dates[1]] . ' ' . $dates[2];
    }

    public static function toIndonesianCurrencyFormat($value){
        return number_format($value,0,',','.');
    }

    public static function toIndonesianCurrencyStringFormat($value){
        $tempValue = abs($value);
		$letter = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($tempValue < 12) {
			$temp = " ". $letter[$tempValue];
		} else if ($tempValue <20) {
			$temp = FormatHelper::toIndonesianCurrencyStringFormat($tempValue - 10). " belas";
		} else if ($tempValue < 100) {
			$temp = FormatHelper::toIndonesianCurrencyStringFormat($tempValue/10)." puluh". FormatHelper::toIndonesianCurrencyStringFormat($tempValue % 10);
		} else if ($tempValue < 200) {
			$temp = " seratus" . FormatHelper::toIndonesianCurrencyStringFormat($tempValue - 100);
		} else if ($tempValue < 1000) {
			$temp = FormatHelper::toIndonesianCurrencyStringFormat($tempValue/100) . " ratus" . FormatHelper::toIndonesianCurrencyStringFormat($tempValue % 100);
		} else if ($tempValue < 2000) {
			$temp = " seribu" . FormatHelper::toIndonesianCurrencyStringFormat($tempValue - 1000);
		} else if ($tempValue < 1000000) {
			$temp = FormatHelper::toIndonesianCurrencyStringFormat($tempValue/1000) . " ribu" . FormatHelper::toIndonesianCurrencyStringFormat($tempValue % 1000);
		} else if ($tempValue < 1000000000) {
			$temp = FormatHelper::toIndonesianCurrencyStringFormat($tempValue/1000000) . " juta" . FormatHelper::toIndonesianCurrencyStringFormat($tempValue % 1000000);
		} else if ($tempValue < 1000000000000) {
			$temp = FormatHelper::toIndonesianCurrencyStringFormat($tempValue/1000000000) . " milyar" . FormatHelper::toIndonesianCurrencyStringFormat(fmod($tempValue,1000000000));
		} else if ($tempValue < 1000000000000000) {
			$temp = FormatHelper::toIndonesianCurrencyStringFormat($tempValue/1000000000000) . " trilyun" . FormatHelper::toIndonesianCurrencyStringFormat(fmod($tempValue,1000000000000));
		}     

        $temp = $value < 0 ? 'minus '. $temp : $temp;
        return ucwords($temp);
    }
}
?>