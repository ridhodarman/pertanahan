<?php 

function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	try{
		$pecahkan = explode('-', $tanggal);
		// variabel pecahkan 0 = tanggal
		// variabel pecahkan 1 = bulan
		// variabel pecahkan 2 = tahun
	//die(var_dump($pecahkan));
		//die($pecahkan[1]);
		//$b=(int)$pecahkan[1];
		if (isset($pecahkan[1])) {
		//if (null) {
			$b=$pecahkan[1];
			$b2=intval($b);
			$b3=$bulan[$b2];
			$hasil=$pecahkan[2].' '.$b3. ' ' . $pecahkan[0];
			return $hasil;
		}
		else{
			$t = date("d-m-Y",strtotime($tanggal));
			return str_replace("-"," ",$t);
			//return "... ... ...";
		}
		
	}
	catch (exception $e) {
		return "... ... ...";
	}
}
 

function nama_hari($tanggal) {
	$tanggal = '2017-01-31';
	$hari   = date('l', microtime($tanggal));
	$hari_indonesia = array('Monday'  => 'Senin',
	'Tuesday'  => 'Selasa',
	'Wednesday' => 'Rabu',
	'Thursday' => 'Kamis',
	'Friday' => 'Jumat',
	'Saturday' => 'Sabtu',
	'Sunday' => 'Minggu');
	return $hari_indonesia[$hari];
}

function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);    
		}
		return $temp;
	}

$tanggal_rapat_persiapan =tgl_indo($tanggal_rapat_persiapan ); // 1 Januari 1900
$hari_rapat_persiapan =nama_hari($tanggal_rapat_persiapan ); 
$document = str_replace("#hari_rapat_persiapan", $hari_rapat_persiapan, $document);

$tanggal_stpl =tgl_indo($tanggal_stpl);
$tanggal_peninjauan = date("d-m-Y",strtotime($tanggal_peninjauan));
$sampai_peninjauan = date("d-m-Y",strtotime($sampai_peninjauan));
$hari_peninjauan =nama_hari($tanggal_peninjauan ); 
$document = str_replace("#hari_peninjauan", $hari_peninjauan, $document);
//$document = str_replace("#tanggal_peninjauan", $tanggal_peninjauan, $document);

$tanggal_ba_lapang2 =tgl_indo($tanggal_ba_lapang );
$document = str_replace("#tanggal_ba_peninjauan", $tanggal_ba_lapang2, $document);
$data = explode(" " , $tanggal_ba_lapang2);
$hari_ba_lapang = nama_hari($tanggal_ba_lapang2);
$document = str_replace("#hari_ba_lapang", $hari_ba_lapang, $document);
$bulan_ba_lapang = $data[1];
$document = str_replace("#bulan_ba_lapang", $bulan_ba_lapang, $document);

$tanggal_ba_lapang = date("d-m-Y",strtotime($tanggal_ba_lapang));

$thn_ba_lapang = date("Y",strtotime($tanggal_ba_lapang));
$thn_ba_lapang = ucwords(trim(penyebut($thn_ba_lapang)));
$document = str_replace("#thn_ba_lapang", $thn_ba_lapang, $document);

$tgl_ba_lapang = date("d",strtotime($tanggal_ba_lapang));
$tgl_ba_lapang = ucwords(trim(penyebut($tgl_ba_lapang)));
$document = str_replace("#tgl_ba_lapang", $tgl_ba_lapang, $document);

$tanggal_st_pengolah_data =tgl_indo($tanggal_st_pengolahan_data );
$document = str_replace("#tanggal_st_pengolah_data", $tanggal_st_pengolah_data, $document);
$data = explode(" " , $tanggal_st_pengolah_data);
$hari_pengolahan_data = nama_hari($tanggal_st_pengolahan_data);
$document = str_replace("#hari_pengolahan_data", $hari_pengolahan_data, $document);
$bulan_pengolahan_data = $data[1];
$document = str_replace("#bulan_pengolahan_data", $bulan_pengolahan_data, $document);

$tanggal_st_pengolahan_data = date("d-m-Y",strtotime($tanggal_st_pengolahan_data));

$thn_pengolahan_data = date("Y",strtotime($tanggal_st_pengolahan_data));
$thn_pengolahan_data = ucwords(trim(penyebut($thn_pengolahan_data)));
$document = str_replace("#thn_pengolahan_data", $thn_pengolahan_data, $document);

$tgl_pengolahan_data = date("d",strtotime($tanggal_st_pengolahan_data));
$tgl_pengolahan_data = ucwords(trim(penyebut($tgl_pengolahan_data)));
$document = str_replace("#tgl_pengolahan_data", $tgl_pengolahan_data, $document);


$ttanggal_rapat_pembahasan =tgl_indo($tanggal_rapat_pembahasan );
$document = str_replace("#ttanggal_rapat_pembahasan", $ttanggal_rapat_pembahasan, $document);
$hari_rapat_pembahasan = nama_hari($tanggal_rapat_pembahasan);
$document = str_replace("#hari_rapat_pembahasan", $hari_rapat_pembahasan, $document);

$tgl_rapat_pembahasan = date("d",strtotime($tanggal_rapat_pembahasan));
$tgl_rapat_pembahasan = ucwords(trim(penyebut($tgl_rapat_pembahasan)));
$document = str_replace("#tgl_rapat_pembahasan", $tgl_rapat_pembahasan, $document);

$thn_rapat_pembahasan = date("Y",strtotime($tanggal_rapat_pembahasan));
$thn_rapat_pembahasan = ucwords(trim(penyebut($thn_rapat_pembahasan)));
$document = str_replace("#thn_rapat_pembahasan", $thn_rapat_pembahasan, $document);

$data = explode(" " , $ttanggal_rapat_pembahasan);
$bulan_rapat_pembahasan = $data[1];
$document = str_replace("#bulan_rapat_pembahasan", $bulan_rapat_pembahasan, $document);


$tanggal_risalah =tgl_indo($tanggal_risalah );
$tanggal_surat_pertek =tgl_indo($tanggal_surat_pertek );

$uraian_sesuai = str_replace(chr(194), "", $uraian_sesuai);
$alasan_bersyarat = str_replace(chr(194), "", $alasan_bersyarat);
$alasan_tidak_sesuai = str_replace(chr(194), "", $alasan_tidak_sesuai);

$tanggal_permohonan = date("d-m-Y",strtotime($tanggal_permohonan));

$document = str_replace("#no_berkas", $no_berkas, $document);
$document = str_replace("#tahun", $tahun, $document);
$document = str_replace("#jenis_pertek", $jenis_pertek, $document);
$document = str_replace("#nama_pemohon", $nama_pemohon, $document);
$document = str_replace("#nik", $nik, $document);
$document = str_replace("#alamat_pemohon", $alamat, $document);
$document = str_replace("#bertindak_atas_nama", $bertindak_atas_nama, $document);
$document = str_replace("#desa_nagari", $desa_nagari, $document);
$document = str_replace("#kecamatan", $kecamatan, $document);
$document = str_replace("#alamat_lokasi", $alamat_lokasi, $document);
$document = str_replace("#tanggal_rapat_persiapan", $tanggal_rapat_persiapan, $document);
$document = str_replace("#jam_rapat_persiapan", $jam_rapat_persiapan, $document);
$document = str_replace("#luas", $luas, $document);
$document = str_replace("#tanggal_permohonan", $tanggal_permohonan, $document);
$document = str_replace("#tanggal_peninjauan", $tanggal_peninjauan, $document);
$document = str_replace("#sampai_peninjauan", $sampai_peninjauan, $document);
$document = str_replace("#no_stpl", $no_stpl, $document);
$document = str_replace("#tanggal_stpl", $tanggal_stpl, $document);
$document = str_replace("#koordinat_lokasi", $koordinat_lokasi, $document);
$document = str_replace("#kawasan_rtrw", $kawasan_rtrw, $document);
$document = str_replace("#penggunaan_tanah", $penggunaan_tanah, $document);
$document = str_replace("#penguasaan_tanah", $penguasaan_tanah, $document);
$document = str_replace("#indikasi_skp", $indikasi_skp, $document);
$document = str_replace("#lereng", $lereng, $document);
$document = str_replace("#tekstur", $tekstur, $document);
$document = str_replace("#kedalaman_efektif", $kedalaman_efektif, $document);
$document = str_replace("#drainase", $drainase, $document);
$document = str_replace("#erosi", $erosi, $document);
$document = str_replace("#faktor_pembatas", $faktor_pembatas, $document);
$document = str_replace("#ketinggian", $ketinggian, $document);
$document = str_replace("#mata_air", $mata_air, $document);
$document = str_replace("#keberadaan_tanah_timbul", $keberadaan_tanah_timbul, $document);
$document = str_replace("#pancang_diatas_air", $pancang_diatas_air, $document);
$document = str_replace("#terletak_dipulau_kecil", $terletak_dipulau_kecil, $document);
$document = str_replace("#nama_pulau", $nama_pulau, $document);
$document = str_replace("#lluas_pulau", $luas_pulau, $document);
$document = str_replace("#kekerasan_tanah_timbul", $kekerasan_tanah_timbul, $document);
$document = str_replace("#intrusi_air_laut", $intrusi_air_laut, $document);
$document = str_replace("#jenis_tanah_timbul", $jenis_tanah_timbul, $document);
$document = str_replace("#pola_pasang_surut", $pola_pasang_surut, $document);
$document = str_replace("#arus_gel_laut", $arus_gel_laut, $document);
$document = str_replace("#keberadaan_mangrove_dll", $keberadaan_mangrove_dll, $document);
$document = str_replace("#jumlah_penduduk", $jumlah_penduduk, $document);
$document = str_replace("#kepadatan_penduduk", $kepadatan_penduduk, $document);
$document = str_replace("#rerata_kepemilikan_tanah", $rerata_kepemilikan_tanah, $document);
$document = str_replace("#kepadatan_agraris", $kepadatan_agraris, $document);
$document = str_replace("#mayoritas_mata_pencaharian", $mayoritas_mata_pencaharian, $document);
$document = str_replace("#rencana_penggunaan_tanah", $rencana_penggunaan_tanah, $document);
$document = str_replace("#jaringan_jalan", $jaringan_jalan, $document);
$document = str_replace("#jaringan_listrik", $jaringan_listrik, $document);
$document = str_replace("#air_minum", $air_minum, $document);
$document = str_replace("#saluran_drainase", $saluran_drainase, $document);
$document = str_replace("#pipa_minyak", $pipa_minyak, $document);
$document = str_replace("#gas", $gas, $document);
$document = str_replace("#longsor", $longsor, $document);
$document = str_replace("#banjir_rob", $banjir_rob, $document);
$document = str_replace("#banjir", $banjir, $document);
$document = str_replace("#bencana_lainnya", $bencana_lainnya, $document);
$document = str_replace("#keterangan_lain_lokasi", $keterangan_lain_lokasi, $document);
$document = str_replace("#ppenggunaan_tanah_sekitar", $penggunaan_tanah_sekitar, $document);
$document = str_replace("#keserasian", $keserasian, $document);
$document = str_replace("#kesesuaian_karakteristik_tanah", $kesesuaian_karakteristik_tanah, $document);
$document = str_replace("#utara", $utara, $document);
$document = str_replace("#timur", $timur, $document);
$document = str_replace("#selatan", $selatan, $document);
$document = str_replace("#barat", $barat, $document);
$document = str_replace("#jarak_jalan_penghubung", $jarak_jalan_penghubung, $document);
$document = str_replace("#jarak_jalan_arteri", $jarak_jalan_arteri, $document);
$document = str_replace("#ppenguasaan_tanah_sekitar", $penguasaan_tanah_sekitar, $document);
$document = str_replace("#infrastruktur_berkaitan", $infrastruktur_berkaitan, $document);
$document = str_replace("#jaringan_lainnya", $jaringan_lainnya, $document);
$document = str_replace("#keterangan_lain_sekitar", $keterangan_lain_sekitar, $document);
$document = str_replace("#nib", $nib, $document);
$document = str_replace("#kbli", $kbli, $document);
$document = str_replace("#no_ba_lapang", $no_ba_lapang, $document);
$document = str_replace("#tanggal_ba_lapang", $tanggal_ba_lapang, $document);
$document = str_replace("#no_st_pengolahan_data", $no_st_pengolahan_data, $document);
$document = str_replace("#tanggal_st_pengolahan_data", $tanggal_st_pengolahan_data, $document);
$document = str_replace("#no_ba_pengolahan_data", $no_ba_pengolahan_data, $document);
$document = str_replace("#tanggal_ba_pengolahan_data", $tanggal_st_pengolahan_data, $document);
$document = str_replace("#no_ba_rapat_pembahasan", $no_ba_rapat_pembahasan, $document);
$document = str_replace("@luas_sesuai", $luas_sesuai, $document);
$document = str_replace("^luas_tidak_sesuai", $luas_tidak_sesuai, $document);
$document = str_replace("*luas_bersyarat", $luas_bersyarat, $document);
$document = str_replace("#uraian_sesuai", $uraian_sesuai, $document);
$document = str_replace("#alasan_bersyarat", $alasan_bersyarat, $document);
$document = str_replace("#alasan_tidak_sesuai", $alasan_tidak_sesuai, $document);
$document = str_replace("#tanggal_rapat_pembahasan", $tanggal_rapat_pembahasan, $document);
$document = str_replace("#no_risalah", $no_risalah, $document);
$document = str_replace("#tanggal_risalah", $tanggal_risalah, $document);
$document = str_replace("#no_surat_pertek", $no_surat_pertek, $document);
$document = str_replace("#tanggal_surat_pertek", $tanggal_surat_pertek, $document);

 
?>