<?php
include '../../../inc/koneksi.php';
try {
	$id = stripslashes(strip_tags(htmlspecialchars(base64_decode($_POST['id']), ENT_QUOTES)));
	$no_berkas = $_POST['no_berkas'];
	$tahun = $_POST['tahun'];
	$id_format = $_POST['id_format'];
	$jenis_pertek = $_POST['jenis_pertek'];
	$nama_pemohon = $_POST['nama_pemohon'];
	$nik = $_POST['nik'];
	$alamat = $_POST['alamat'];
	$bertindak_atas_nama = $_POST['bertindak_atas_nama'];
	$desa_nagari = $_POST['desa_nagari'];
	$kecamatan = $_POST['kecamatan'];
	$alamat_lokasi = $_POST['alamat_lokasi'];
	$tanggal_rapat_persiapan = $_POST['tanggal_rapat_persiapan'];
	$jam_rapat_persiapan = $_POST['jam_rapat_persiapan'];
	$luas = $_POST['luas'];
	$tanggal_permohonan = $_POST['tanggal_permohonan'];
	$tanggal_peninjauan = $_POST['tanggal_peninjauan'];
	$sampai_peninjauan = $_POST['sampai_peninjauan'];
	$no_stpl = $_POST['no_stpl'];
	$tanggal_stpl = $_POST['tanggal_stpl'];
	$koordinat_lokasi = $_POST['koordinat_lokasi'];
	$kawasan_rtrw = $_POST['kawasan_rtrw'];
	$penggunaan_tanah = $_POST['penggunaan_tanah'];
	$penguasaan_tanah = $_POST['penguasaan_tanah'];
	$indikasi_skp = $_POST['indikasi_skp'];
	$lereng = $_POST['lereng'];
	$tekstur = $_POST['tekstur'];
	$kedalaman_efektif = $_POST['kedalaman_efektif'];
	$drainase = $_POST['drainase'];
	$erosi = $_POST['erosi'];
	$faktor_pembatas = $_POST['faktor_pembatas'];
	$ketinggian = $_POST['ketinggian'];
	$mata_air = $_POST['mata_air'];
	$keberadaan_tanah_timbul = $_POST['keberadaan_tanah_timbul'];
	$pancang_diatas_air = $_POST['pancang_diatas_air'];
	$terletak_dipulau_kecil = $_POST['terletak_dipulau_kecil'];
	$nama_pulau = $_POST['nama_pulau'];
	$luas_pulau = $_POST['luas_pulau'];
	$kekerasan_tanah_timbul = $_POST['kekerasan_tanah_timbul'];
	$intrusi_air_laut = $_POST['intrusi_air_laut'];
	$jenis_tanah_timbul = $_POST['jenis_tanah_timbul'];
	$pola_pasang_surut = $_POST['pola_pasang_surut'];
	$arus_gel_laut = $_POST['arus_gel_laut'];
	$keberadaan_mangrove_dll = $_POST['keberadaan_mangrove_dll'];
	$jumlah_penduduk = $_POST['jumlah_penduduk'];
	$kepadatan_penduduk = $_POST['kepadatan_penduduk'];
	$rerata_kepemilikan_tanah = $_POST['rerata_kepemilikan_tanah'];
	$kepadatan_agraris = $_POST['kepadatan_agraris'];
	$mayoritas_mata_pencaharian = $_POST['mayoritas_mata_pencaharian'];
	$rencana_penggunaan_tanah = $_POST['rencana_penggunaan_tanah'];
	$jaringan_jalan = $_POST['jaringan_jalan'];
	$jaringan_listrik = $_POST['jaringan_listrik'];
	$air_minum = $_POST['air_minum'];
	$saluran_drainase = $_POST['saluran_drainase'];
	$pipa_minyak = $_POST['pipa_minyak'];
	$gas = $_POST['gas'];
	$longsor = $_POST['longsor'];
	$banjir_rob = $_POST['banjir_rob'];
	$banjir = $_POST['banjir'];
	$bencana_lainnya = $_POST['bencana_lainnya'];
	$keterangan_lain_lokasi = $_POST['keterangan_lain_lokasi'];
	$penggunaan_tanah_sekitar = $_POST['penggunaan_tanah_sekitar'];
	$keserasian = $_POST['keserasian'];
	$kesesuaian_karakteristik_tanah = $_POST['kesesuaian_karakteristik_tanah'];
	$utara = $_POST['utara'];
	$timur = $_POST['timur'];
	$selatan = $_POST['selatan'];
	$barat = $_POST['barat'];
	$jarak_jalan_penghubung = $_POST['jarak_jalan_penghubung'];
	$jarak_jalan_arteri = $_POST['jarak_jalan_arteri'];
	$penguasaan_tanah_sekitar = $_POST['penguasaan_tanah_sekitar'];
	$infrastruktur_berkaitan = $_POST['infrastruktur_berkaitan'];
	$jaringan_lainnya = $_POST['jaringan_lainnya'];
	$keterangan_lain_sekitar = $_POST['keterangan_lain_sekitar'];
	$nib = $_POST['nib'];
	$kbli = $_POST['kbli'];
	$no_ba_lapang = $_POST['no_ba_lapang'];
	$tanggal_ba_lapang = $_POST['tanggal_ba_lapang'];
	$no_st_pengolahan_data = $_POST['no_st_pengolahan_data'];
	$tanggal_st_pengolahan_data = $_POST['tanggal_st_pengolahan_data'];
	$no_ba_pengolahan_data = $_POST['no_ba_pengolahan_data'];
	$tanggal_ba_pengolahan_data = $_POST['tanggal_st_pengolahan_data'];
	$luas_sesuai = $_POST['luas_sesuai'];
	$luas_tidak_sesuai = $_POST['luas_tidak_sesuai'];
	$luas_bersyarat = $_POST['luas_bersyarat'];
	$uraian_sesuai = $_POST['uraian_sesuai'];
	$alasan_bersyarat = $_POST['alasan_bersyarat'];
	$alasan_tidak_sesuai = $_POST['alasan_tidak_sesuai'];
	$no_ba_rapat_pembahasan = $_POST['no_ba_rapat_pembahasan'];
	$tanggal_rapat_pembahasan = $_POST['tanggal_rapat_pembahasan'];
	$no_risalah = $_POST['no_risalah'];
	$tanggal_risalah = $_POST['tanggal_risalah'];
	$no_surat_pertek = $_POST['no_surat_pertek'];
	$tanggal_surat_pertek = $_POST['tanggal_surat_pertek'];
	$id_format = $_POST['id_format'];

	$query = "UPDATE berkas_pertek SET 
				no_berkas=?,
				tahun=?,
				id_format=?,
				jenis_pertek=?,
				nama_pemohon=?,
				nik=?,
				alamat=?,
				bertindak_atas_nama=?,
				desa_nagari=?,
				kecamatan=?,
				alamat_lokasi=?,
				tanggal_rapat_persiapan=?,
				jam_rapat_persiapan=?,
				luas=?,
				tanggal_permohonan=?,
				tanggal_peninjauan=?,
				sampai_peninjauan=?,
				no_stpl=?,
				tanggal_stpl=?,
				koordinat_lokasi=?,
				kawasan_rtrw=?,
				penggunaan_tanah=?,
				penguasaan_tanah=?,
				indikasi_skp=?,
				lereng=?,
				tekstur=?,
				kedalaman_efektif=?,
				drainase=?,
				erosi=?,
				faktor_pembatas=?,
				ketinggian=?,
				mata_air=?,
				keberadaan_tanah_timbul=?,
				pancang_diatas_air=?,
				terletak_dipulau_kecil=?,
				nama_pulau=?,
				luas_pulau=?,
				kekerasan_tanah_timbul=?,
				intrusi_air_laut=?,
				jenis_tanah_timbul=?,
				pola_pasang_surut=?,
				arus_gel_laut=?,
				keberadaan_mangrove_dll=?,
				jumlah_penduduk=?,
				kepadatan_penduduk=?,
				rerata_kepemilikan_tanah=?,
				kepadatan_agraris=?,
				mayoritas_mata_pencaharian=?,
				rencana_penggunaan_tanah=?,
				jaringan_jalan=?,
				jaringan_listrik=?,
				air_minum=?,
				saluran_drainase=?,
				pipa_minyak=?,
				gas=?,
				longsor=?,
				banjir_rob=?,
				banjir=?,
				bencana_lainnya=?,
				keterangan_lain_lokasi=?,
				penggunaan_tanah_sekitar=?,
				keserasian=?,
				kesesuaian_karakteristik_tanah=?,
				utara=?,
				timur=?,
				selatan=?,
				barat=?,
				jarak_jalan_penghubung=?,
				jarak_jalan_arteri=?,
				penguasaan_tanah_sekitar=?,
				infrastruktur_berkaitan=?,
				jaringan_lainnya=?,
				keterangan_lain_sekitar=?,
				nib=?,
				kbli=?,
				no_ba_lapang=?,
				tanggal_ba_lapang=?,
				no_st_pengolahan_data=?,
				tanggal_st_pengolahan_data=?,
				no_ba_pengolahan_data=?,
				tanggal_ba_pengolahan_data=?,
				no_ba_rapat_pembahasan=?,
				tanggal_rapat_pembahasan=?,
				luas_sesuai=?,
				luas_tidak_sesuai=?,
				luas_bersyarat=?,
				uraian_sesuai=?,
				alasan_tidak_sesuai=?,
				alasan_bersyarat=?,
				no_risalah=?,
				tanggal_risalah=?,
				no_surat_pertek=?,
				tanggal_surat_pertek=?,
				id_format=?
				WHERE id=?";
			$sql = $koneksi->prepare($query);
			$sql->bind_param(
				"sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss",
				$no_berkas,
				$tahun,
				$id_format,
				$jenis_pertek,
				$nama_pemohon,
				$nik,
				$alamat,
				$bertindak_atas_nama,
				$desa_nagari,
				$kecamatan,
				$alamat_lokasi,
				$tanggal_rapat_persiapan,
				$jam_rapat_persiapan,
				$luas,
				$tanggal_permohonan,
				$tanggal_peninjauan,
				$sampai_peninjauan,
				$no_stpl,
				$tanggal_stpl,
				$koordinat_lokasi,
				$kawasan_rtrw,
				$penggunaan_tanah,
				$penguasaan_tanah,
				$indikasi_skp,
				$lereng,
				$tekstur,
				$kedalaman_efektif,
				$drainase,
				$erosi,
				$faktor_pembatas,
				$ketinggian,
				$mata_air,
				$keberadaan_tanah_timbul,
				$pancang_diatas_air,
				$terletak_dipulau_kecil,
				$nama_pulau,
				$luas_pulau,
				$kekerasan_tanah_timbul,
				$intrusi_air_laut,
				$jenis_tanah_timbul,
				$pola_pasang_surut,
				$arus_gel_laut,
				$keberadaan_mangrove_dll,
				$jumlah_penduduk,
				$kepadatan_penduduk,
				$rerata_kepemilikan_tanah,
				$kepadatan_agraris,
				$mayoritas_mata_pencaharian,
				$rencana_penggunaan_tanah,
				$jaringan_jalan,
				$jaringan_listrik,
				$air_minum,
				$saluran_drainase,
				$pipa_minyak,
				$gas,
				$longsor,
				$banjir_rob,
				$banjir,
				$bencana_lainnya,
				$keterangan_lain_lokasi,
				$penggunaan_tanah_sekitar,
				$keserasian,
				$kesesuaian_karakteristik_tanah,
				$utara,
				$timur,
				$selatan,
				$barat,
				$jarak_jalan_penghubung,
				$jarak_jalan_arteri,
				$penguasaan_tanah_sekitar,
				$infrastruktur_berkaitan,
				$jaringan_lainnya,
				$keterangan_lain_sekitar,
				$nib,
				$kbli,
				$no_ba_lapang,
				$tanggal_ba_lapang,
				$no_st_pengolahan_data,
				$tanggal_st_pengolahan_data,
				$no_ba_pengolahan_data,
				$tanggal_ba_pengolahan_data,
				$no_ba_rapat_pembahasan,
				$tanggal_rapat_pembahasan,
				$luas_sesuai,
				$luas_tidak_sesuai,
				$luas_bersyarat,
				$uraian_sesuai,
				$alasan_tidak_sesuai,
				$alasan_bersyarat,
				$no_risalah,
				$tanggal_risalah,
				$no_surat_pertek,
				$tanggal_surat_pertek,
				$id_format,
				$id
			);
	if ($sql->execute()) {
		//echo "data berhasil di update<br/>Print...";
	}
} catch (exception $e) {
	//echo "<b>gagal di proses, kendalayo:</b><br/>".mysqli_error($koneksi);	
	header("location:../assets/error");
}
