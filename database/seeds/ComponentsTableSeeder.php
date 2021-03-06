<?php

use Illuminate\Database\Seeder;

class ComponentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Navbar Welcome
        DB::table('components')->insert([
            'name' => 'Navbar Welcome',
            'category_id' => 6,
            'is_navbar' => 1,
            'background_color' => '#ff9000',
        ]);

        //  secondary navbar 1
        DB::table('components')->insert([
            'name' => 'Secondary Navbar Welcome (First)',
            'category_id' => 7,
            'is_navbar_2' => 1,
            'background_color' => '#ff0008',
            'background_image' => null,
        ]);

        // secondary navbar 2
        DB::table('components')->insert([
            'name' => 'Secondary Navbar Welcome (Second)',
            'category_id' => 7,
            'is_navbar_2' => 1,
            'background_color' => '#ffffff',
            'background_image' => null,
        ]);

        // page 1
        DB::table('components')->insert([
            'name' => 'Visi dan Misi',
            'category_id' => 4,
            'is_page' => 1,
            'url_detail' => '/components/4',
            'content' => '
            <h1 style="text-align: center;">Visi dan Misi</h1>

            <h1>&nbsp;</h1>

            <h1>Visi</h1>

            <hr />
            <figure class="image" style="float:right"><img alt="Haris Iskandar" height="172" src="http://localhost:8000/photos/2/Visi &amp; Misi/Harris_Iskandar1a.jpg" width="204" />
            <figcaption>ir. Harris Iskandar, Ph.D<br />
            Direktur Jenderal PAUD dan DIKMAS</figcaption>
            </figure>

            <p style="text-align:justify">&nbsp; &nbsp; Pembangunan pendidikan nasional ke depan didasarkan pada paradigma membangun manusia Indonesia seutuhnya berfungsi sebagai subyek yang memiliki kapasitas untuk mengaktualisasikan potensi dan dimensi kemanusiaan secara optimal, diarahkan untuk meningkatkan mutu dan daya saing SDM Indonesia pada era perekonomian berbasis pengetahuan (<em>knowledge based economy</em>) dan pembangunan ekonomi kreatif.</p>

            <p>Pendidikan Nonformal dan Informal bagian dari pendidikan nasional berusaha mengaktualisasikan potensi dan dimensi kemanusiaan dari ranah afektif, kognitif, dan psikomotorik yang diberlakukan sepanjang hayat yang merupakan proses sistematis untuk meningkatkan martabat manusia secara holistik, seyogyanya menjadi wahana strategis bagi upaya mengembangkan segenap potensi individu, sehingga cita-cita membangun manusia Indonesia seutuhnya dapat tercapai.</p>

            <p>Visi : Terselenggaranya layanan pendidikan untuk mewujudkan insan Indonesia yang cerdas, terampil, mandiri dan profesional.</p>

            <p>&nbsp;</p>

            <h1>Misi</h1>

            <hr />
            <ol>
                <li>Meningkatkan ketersediaan dan keterjangkauan layanan PAUD nonformal dan informal bermutu dalam rangka mewujudkan anak yang cerdas, kreatif, sehat, ceria, berakhlak mulia sesuai dengan karakteristik dan pertumbuhan dan perkembangan anak serta memiliki kesiapan fisik dan mental untuk memasuki pendidikan lebih lanjut.</li>
                <li>Meningkatkan ketersediaan dan keterjangkauan layanan pendidikan keaksaraan usia 15 tahun ke atas berbasis pendidikan kecakapan hidup, bermutu, berkesetaraan gender dan relevan dengan kebutuhan individu dan masyarakat.</li>
                <li>Meningkatkan ketersediaan dan keterjangkauan layanan kursus dan pelatihan, dan pemberdayaan perempuan yang bermutu, berkeadilan, berkelanjutan, berdaya saing, berkesetaraan gender untuk pengembangan berkelanjutan, berdaya saing dan relevan dengan kebutuhan individu dan masyarakat.</li>
                <li>Melaksanakan penguatan sistem manajemen pendidikan nonformal dan informal meliputi tata kelola, akuntabilitas, dan pencitraan publik dalam rangka penjaminan mutu.</li>
                <li>Mengembangkan minat baca masyarakat melalui ketersediaan TBM yang merata dan meluas serta bermutu.</li>
                <li>Meningkatkan ketersediaan dan kerjangkauan layanan pendidik dan tenaga pendidikan yang profesional dan bermartabat sesuai dengan kebutuhan dan secara berkelanjutan.</li>
                <li>Mengembangkan pendidikan pemberdayaan perempuan dan pengarustamaan gender dalam upaya peningkatan harkat dan martabat perempuan yang berkeadilan gender.</li>
            </ol>'
        ]);

        // page 2
        DB::table('components')->insert([
            'name' => 'Tugas & Fungsi',
            'category_id' => 4,
            'is_page' => 1,
            'url_detail' => '/components/5',
            'content' => '
            <h1 style="text-align:center">Tugas dan&nbsp;Fungsi</h1>

            <p>&nbsp;</p>

            <p>Sesuai dengan Peraturan Menteri Pendidikan dan Kebudayaan Nomor 11 Tahun 2015 tentang Organisasi Tata Laksana Kementerian Pendidikan dan Kebudayaan, Direktorat Jenderal Pendidikan Anak Usia Dini dan Pendidikan Masyarakat mempunyai tugas menyelenggarakan perumusan dan pelaksanaan kebijakan di bidang Pendidikan Anak Usia Dini dan Pendidikan Masyarakat.</p>

            <p>Direktorat Jenderal Pendidikan Anak Usia Dini dan Pendidikan Masyarakat menyelenggarakan fungsi:</p>

            <ol>
                <li>Perumusan kebijakan di bidang kurikulum, peserta didik, sarana dan prasarana, pendanaan, dan tata kelola pendidikan anak usia dini dan pendidikan masyarakat;</li>
                <li>Pelaksanaan kebijakan di bidang peningkatan kualitas pendidikan karakter peserta didik, fasilitasi sumber daya, pemberian izin dan kerja sama penyelenggaraan satuan dan/atau program yang diselenggarakan perwakilan negara asing atau lembaga asing, dan penjaminan mutu pendidikan anak usia dini dan pendidikan masyarakat;</li>
                <li>Penyusunan norma, standar, prosedur, dan kriteria di bidang kurikulum, peserta didik, sarana dan prasarana, pendanaan, dan tata kelola pendidikan anak usia dini dan pendidikan masyarakat;</li>
                <li>Pemberian bimbingan teknis dan supervisi di bidang pendidikan anak usia dini dan pendidikan masyarakat;</li>
                <li>Pelaksanaan evaluasi dan pelaporan di bidang pendidikan anak usia dini dan pendidikan masyarakat;</li>
                <li>Pelaksanaan administrasi Direktorat Jenderal Pendidikan Anak Usia Dini dan Pendidikan Masyarakat; dan</li>
                <li>Pelaksanaan fungsi lain yang diberikan Menteri.</li>
            </ol>

            <p>Direktorat Jenderal Pendidikan Anak Usia Dini dan Pendidikan Masyarakat terdiri atas:</p>

            <ol>
                <li>Sekretariat Direktorat Jenderal Pendidikan Anak Usia Dini dan Pendidikan Masyarakat;</li>
                <li>Direktorat Pembinaan Pendidikan Anak Usia Dini;</li>
                <li>Direktorat Pembinaan Pendidikan Keluarga;</li>
                <li>Direktorat Pembinaan Pendidikan Keaksaraan dan Kesetaraan;</li>
                <li>Direktorat Pembinaan Kursus dan Pelatihan.</li>
            </ol>'
        ]);

        // page 3
        DB::table('components')->insert([
            'name' => 'Struktur Organisasi',
            'category_id' => 4,
            'is_page' => 1,
            'url_detail' => '/components/6',
            'content' => '
            <h1 style="text-align:center">Struktur Organisasi</h1>

            <p style="text-align:center"><img alt="so" height="900" src="http://localhost:8000/photos/2/Struktur Organisasi/SO.jpg" width="1100" /></p>

            <p>&nbsp;</p>'
        ]);

        // page 4
        DB::table('components')->insert([
            'name' => 'Reformasi Birokrasi',
            'category_id' => 4,
            'is_page' => 1,
            'url_detail' => '/components/7',
            'content' => '
            <h1 style="text-align: center;">Reformasi Birokrasi Internal Ditjen PAUD dan Dikmas</h1>

            <p style="text-align:center"><img alt="rbi" height="514" src="http://localhost:8000/photos/2/Reformasi birokrasi/rbi.jpeg" width="1051" /></p>

            <p>&nbsp;</p>'
        ]);

        DB::table('components')->insert([
            'name' => '#test',
            'category_id' => 4,
            'is_page' => 1,
            'url_detail' => '/components/8',
            'content' => '<p>-</p>'
        ]);

        DB::table('components')->insert([
            'name' => 'Vertikal',
            'category_id' => 4,
            'is_page_link' => 1,
            'url_detail' => '/components/9',
            'content' => '
            <h1>Unit Vertikal Dirjen PAUD dan Dikmas</h1>

            <h3>&nbsp;</h3>

            <h2>Kantor Pusat</h2>

            <hr />
            <p><a href="https://sahabatkeluarga.kemdikbud.go.id/laman/">Direktorat Pembinaan Pendidikan Keluarga(DITBINDIKKEL)</a></p>

            <p style="margin-left:40px">Gd. C Lt. 13 Komplek Kemendikbud Jl. Jendral Sudirman Senayan - Jakarta 10270 |&nbsp;Telp/Faks: 021-5703336 |&nbsp;E-mail: sahabatkeluarga@kemdikbud.go.id</p>

            <hr />
            <p><a href="http://kursus.kemendikbud.go.id">Direktorat Pembinaan Kursus dan Pelatihan(DITBINSUSLAT)</a></p>

            <p style="margin-left:40px">Gd. E Lt. 6 Komplek Kemendikbud Jl. Jendral Sudirman Senayan - Jakarta 10270 |&nbsp;Telp/Fax:(021)5725041 |&nbsp;E-mail: ditbinsus@kemendikbud.go.id</p>

            <hr />
            <p><a href="http://paud.kemdikbud.go.id/">Direktorat Pembinaan Pendidikan Anak Usia Dini(DITBINPAUD)</a></p>

            <p style="margin-left:40px">Gd. E Lt. 7 Komplek Kemendikbud, Jl. Jendral Sudirman Senayan - Jakarta 10270 | Telp : (021) 572 5506, 572 5495 | Fax : (021) 570 3151, 579 00244</p>

            <hr />
            <p><a href="http://bindiktara.kemdikbud.go.id/">Direktorat Pembinaan Pandidikan Keaksaraan dan Kesetaraan(DITBINDIKTARA)</a></p>

            <p style="margin-left:40px">Gd. E Lt. 8 Komplek Kemendikbud Jl. Jendral Sudirman Senayan - Jakarta 10270 | Telp/Faks: +6221 572 5507 | E-mail: ditbindiktara@kemdikbud.go.id</p>

            <hr />
            <p>&nbsp;</p>

            <p>&nbsp;</p>

            <h2>UPT PAUD-DIKMAS</h2>

            <hr />
            <p>1.&nbsp;<a href="http://pauddikmasaceh.kemdikbud.go.id/">BP-PAUD dan Dikmas Aceh</a></p>

            <p style="margin-left:40px">Jalan Teungku Malem, Lubok, Ingin Jaya, Kabupaten Aceh Besar 23371 | Telp: +62 (0651) 7557508&nbsp; | E-mail: pauddikmasaceh@kemdikbud.go.id</p>

            <hr />
            <p>2.&nbsp;<a href="https://pauddikmasriau.kemdikbud.go.id">BP-PAUD dan Dikmas Riau</a></p>

            <p style="margin-left:40px">Jl. Sarwo Edhie No. 7 Sail Pekanbaru ,Riau | Telp: 0761-8406168 | E-mail: pauddikmasriau@kemdikbud.go.id</p>

            <hr />
            <p>3.&nbsp;<a href="https://pauddikmasjambi.kemdikbud.go.id/">BP-PAUD dan Dikmas Jambi</a></p>

            <p style="margin-left:40px">Jl. Koni No. 43 Muara Bulian, Batanghari, Jambi | Telp: (0743) 21298 | E-mail: pauddikmasjambi@kemdikbud.go.id</p>

            <hr />
            <p>4.&nbsp;<a href="https://pauddikmasbengkulu.kemdikbud.go.id/">BP-PAUD dan Dikmas Bengkulu</a></p>

            <p style="margin-left:40px">JL. Basuki Rahmat, No. 14, Belakang Pondok, Padang Jati, Gading Cemp., Kota Bengkulu, Bengkulu 38222 | Telp: (07360 22542</p>

            <hr />
            <p>5.&nbsp;<a href="http://pauddikmaslampung.kemdikbud.go.id">BP-PAUD dan Dikmas Lampung</a></p>

            <p style="margin-left:40px">Jl. Cut Mutia No.23, Gulak Galik, Kec. Tlk. Betung Utara, Kota Bandar Lampung, Lampung 35214 | Telp: (0721) 485825, 489861 | E-mail: bppauddikmaslampung@gmail.com</p>

            <hr />
            <p>6.&nbsp;<a href="http://pauddikmassumut.kemdikbud.go.id/">BP-PAUD dan Dikmas Sumatera Utara</a></p>

            <p style="margin-left:40px">Jl. Kenanga Raya No.64, Tanjung Sari, Medan | Telp: (061) 8213254 | E-mail: pauddikmassumut@kemdikbud.go.id</p>

            <hr />
            <p>7.&nbsp;<a href="http://pauddikmassumbar.kemdikbud.go.id/">BP-PAUD dan Dikmas Sumatera Barat</a></p>

            <p style="margin-left:40px">Jln. Dewi Sartika Rawang Kota Pariaman | Telp: (0751) 91178 | E-mail: info@bppauddikmassumbar.id</p>

            <hr />
            <p>8.&nbsp;<a href="http://pauddikmassumsel.kemdikbud.go.id/">BP-PAUD dan Dikmas Sumatera Selatan</a></p>

            <p style="margin-left:40px">Jalan Naskah II Nomor 734 Kec. Sukarami KM.7 Palembang</p>

            <hr />
            <p>9.&nbsp;<a href="http://pauddikmasbanten.kemdikbud.go.id">BP-PAUD dan Dikmas Banten</a></p>

            <p style="margin-left:40px">Jalan KH. Jamhari Nomor 25, Jl. Kaujon Kidul No.Kel, Serang, Kec. Serang, Kota Serang, Banten 42116 | Telp: (0254) 7823915</p>

            <hr />
            <p>10.&nbsp;<a href="http://pauddikmasjabar.kemdikbud.go.id/">PP-PAUD dan Dikmas Jawa Barat</a></p>

            <p style="margin-left:40px">Jl. Jayagiri No. 63 Kec. Lembang Kabupaten Bandung Barat Jawa Barat 40391, | Phone: 022 2786017 | Fax: 022 2787474 | E-mail: pauddikmasjabar@kemdikbud.go.id</p>

            <hr />
            <p>11.&nbsp;<a href="http://pauddikmasjateng.kemdikbud.go.id/">PP-PAUD dan Dikmas Jawa Tengah</a></p>

            <p style="margin-left:40px">Jl. Diponegoro No.250 Ungaran | E-mail: pauddikmasjateng@kemendikbud.go.id</p>

            <hr />
            <p>12.&nbsp;<a href="http://pauddikmasdiy.kemdikbud.go.id/">BP-PAUD dan Dikmas DIY</a></p>

            <p style="margin-left:40px">Jl. Sorowajan Baru No. 1, Banguntapan, Bantul, Yogyakarta 55198 | Telp: (0274) 484367 | E-mail: pauddikmasdiy@kemendikbud.go.id</p>

            <hr />
            <p>13.&nbsp;<a href="http://pauddikmasjatim.kemdikbud.go.id/">PP-PAUD dan Dikmas Jawa Timur</a></p>

            <p style="margin-left:40px">Jln. Gebang Putih no.10 Sukolilo, Surabaya 60117 | Telp : 031 5945101/5925972 | Fax: 0315953787 | E-mail: pauddikmasjatim@kemdikbud.go.id</p>

            <hr />
            <p>14.&nbsp;<a href="http://pauddikmasbali.kemdikbud.go.id/">PP-PAUD dan Dikmas Bali</a></p>

            <p style="margin-left:40px">Jalan Gurita Raya No. 21 Pegok &ndash; Sesetan, Denpasar Selatan 80223 Bali | Telp/Faks: (0361) 448-3040 | E-mail: pauddikmasbali@kemdikbud.go.id</p>

            <hr />
            <p>15.&nbsp;<a href="https://pauddikmaskalbar.kemdikbud.go.id/">BP-PAUD dan Dikmas Kalimantan Barat</a></p>

            <p style="margin-left:40px">Jalan Raya No. 50 Jungkat Kecamatan Siantan, Kabupaten Mempawah Provinsi Kalimantan Barat | Telp: (0561) 6596227 | E-mail: Pauddikmaskalbar@kemdikbud.go.id</p>

            <hr />
            <p>16.&nbsp;<a href="http://pauddikmaskalteng.kemdikbud.go.id/">BP-PAUD dan Dikmas Kalimantan Tengah</a></p>

            <p style="margin-left:40px">Jl. Tjilik Riwut Km. 5,5 Palangka Raya 73112 | Telp:(0536) 4279030 | E-mail: pauddikmaskalteng@kemdikbud.go.id</p>

            <hr />
            <p>17.&nbsp;<a href="http://pauddikmaskalsel.kemdikbud.go.id/">BP-PAUD dan Dikmas Kalimantan Selatan</a></p>

            <p style="margin-left:40px">Jl. Ambulung Loktabat Selatan Kota Banjarbaru Kalimantan Selatan 70712 | Telp: (0511) 4772187 | E-mail: bppauddikmas.kalsel@kemdikbud.go.id</p>

            <hr />
            <p>18.&nbsp;<a href="https://pauddikmaskalbar.kemdikbud.go.id/">BP-PAUD dan Dikmas Kalimantan Barat</a></p>

            <p style="margin-left:40px">Jalan Raya No. 50 Jungkat Kecamatan Siantan, Kabupaten Mempawah Provinsi Kalimantan Barat | Telp: (0561) 6596227 | E-mail: Pauddikmaskalbar@kemdikbud.go.id</p>

            <hr />
            <p>19.&nbsp;<a href="http://pauddikmasgorontalo.kemdikbud.go.id/">BP-PAUD dan Dikmas Gorontalo</a></p>

            <p style="margin-left:40px">Jln Adam Hoesa No. 106 Pentadio Timur | Telp: (0435) 882487 | E-mail: pauddikmasgorontalo@kemdikbud.go.id</p>

            <hr />
            <p>20.&nbsp;<a href="http://pauddikmassulut.kemdikbud.go.id/">BP-PAUD dan Dikmas Sulawesi Utara</a></p>

            <p style="margin-left:40px">Jalan Raya Robert Wolter Mongisidi No. 10 Manado. | Telp: (0431) 853398 | E-mail: pauddikmassulut@kemdikbud.go.id</p>

            <hr />
            <p>21.&nbsp;<a href="http://pauddikmassultra.kemdikbud.go.id/">BP-PAUD dan Dikmas Sulawesi Tenggara</a></p>

            <p style="margin-left:40px">Jl. Kijang No.1, Rahandouna, Poasia, Kota Kendari, Sulawesi Tenggara 93232 | Telp: 0853-4104-3348</p>

            <hr />
            <p>22.&nbsp;<a href="http://pauddikmassulteng.kemdikbud.go.id/">BP-PAUD dan Dikmas Sulawesi Tengah</a></p>

            <p style="margin-left:40px">Jl. Tolambu No.12, Kamonji, Kec. Palu Bar., Kota Palu, Sulawesi Tengah 94223 | Telp: (0451) 460291</p>

            <hr />
            <p>23.&nbsp;<a href="http://pauddikmassulbar.kemdikbud.go.id">BP-PAUD dan Dikmas Sulawesi Barat</a></p>

            <p style="margin-left:40px">Jl. Martadinata Legenda Square Tegar 777 Blok RI No. 6 Simboro Mamuju 91511</p>

            <hr />
            <p>24.&nbsp;<a href="http://bppauddikmas-sulsel.id/">BP-PAUD dan Dikmas Sulawesi Selatan</a></p>

            <p style="margin-left:40px">Jl. Adhyaksa No. 2, Panakkukang, Pandang, Makassar, Kota Makassar, Sulawesi Selatan 90231</p>

            <hr />
            <p>25.&nbsp;<a href="http://pauddikmasntt.kemdikbud.go.id/">BP-PAUD dan Dikmas Nusa Tenggara Barat</a></p>

            <p style="margin-left:40px">Jl. Gajah Mada No.173, Jempong Baru, Kec. Sekarbela, Kota Mataram, Nusa Tenggara Bar. 83116 | Telp: (0370) 620870</p>

            <hr />
            <p>26.&nbsp;<a href="http://pauddikmasntt.kemdikbud.go.id/">BP-PAUD dan Dikmas Nusa Tenggara Timur</a></p>

            <p style="margin-left:40px">Kayu Putih, Kec. Oebobo, Kota Kupang, Nusa Tenggara Timur | Telp/Fax: 0380 831833</p>

            <hr />
            <p>27.&nbsp;<a href="https://pauddikmasmaluku.kemdikbud.go.id/">BP-PAUD dan Dikmas Maluku</a></p>

            <p style="margin-left:40px">Jl. Raya Hunitetu -Kairatu Maluku, Ambon, Maluku | E-mail: pauddikmasmaluku@kemdikbud.go.id</p>

            <hr />
            <p>28.&nbsp;<a href="http://pauddikmasmalut.kemdikbud.go.id/home/">BP-PAUD dan Dikmas Maluku Utara</a></p>

            <p style="margin-left:40px">Jl. Teratai Kel. Tanah Tinggi Kec. Ternate Selatan Kota Ternate Maluku Utara | Telp: (+62) 822-9258-1251 | E-mail: pauddikmasmalut@kemdikbud.go.id</p>

            <hr />
            <p>29.&nbsp;<a href="http://pauddikmaspapua.kemdikbud.go.id/">BP-PAUD dan Dikmas Papua</a></p>

            <p style="margin-left:40px">Tim, Asei Kecil, Sentani Tim., Jayapura, Papua 99351</p>
            '
        ]);

        DB::table('components')->insert([
            'name' => 'Aplikasi Paud Dikmas',
            'category_id' => 4,
            'is_page_link' => 1,
            'url_detail' => '#',
            'content' => '-'
        ]);

        DB::table('components')->insert([
            'name' => 'Dokumen',
            'category_id' => 4,
            'is_page_link' => 1,
            'url_detail' => '#',
            'content' => '
            <h2>Unduh Dokumen</h2>

            <h2>&nbsp;</h2>

            <h2>Materi RAKOR</h2>

            <ul>
                <li><a href="https://drive.google.com/open?id=1ThqbS6yrO9y2D1V6MAuXsYjN44IdtL6n">Kebijakan SPM Bidang Pendidikan Dalam PP Nomor 2 Tahun 2018</a>, 14 Februari 2018</li>
                <li><a href="https://drive.google.com/file/d/1Z9d3BBBO0589jyDnjyNUB0Nk-MPrXUji/view?usp=drive_open">Standar Pelayanan Minimal Dalam Perspektif UU Nomor 23 Tahun 2014 Tentang Pemerintahan Daerah</a>, 14 Februari 2018</li>
                <li><a href="https://drive.google.com/open?id=1pQz4AfHAXlW3DVpuL_0gc1lX_Fs6QrAE">Surat Penonaktifan NPSN</a>, 13 Maret 2019</li>
                <li><a href="https://drive.google.com/open?id=1yMjoPnKbDJQDX8VgXzW7f0rWvT8rlff1">Program Direktorat PGTK PAUD dan Dikmas 2019</a>, 28 Maret 2019</li>
            </ul>

            <h2>&nbsp;</h2>

            <h2>Renstra dan PK</h2>

            <ul>
                <li><a href="https://drive.google.com/open?id=1ThqbS6yrO9y2D1V6MAuXsYjN44IdtL6n">Kebijakan SPM Bidang Pendidikan Dalam PP Nomor 2 Tahun 2018</a>, 14 Februari 2018</li>
                <li><a href="https://drive.google.com/file/d/1Z9d3BBBO0589jyDnjyNUB0Nk-MPrXUji/view?usp=drive_open">Standar Pelayanan Minimal Dalam Perspektif UU Nomor 23 Tahun 2014 Tentang Pemerintahan Daerah</a>, 14 Februari 2018</li>
                <li><a href="https://drive.google.com/open?id=1pQz4AfHAXlW3DVpuL_0gc1lX_Fs6QrAE">Surat Penonaktifan NPSN</a>, 13 Maret 2019</li>
                <li><a href="https://drive.google.com/open?id=1yMjoPnKbDJQDX8VgXzW7f0rWvT8rlff1">Program Direktorat PGTK PAUD dan Dikmas 2019</a>, 28 Maret 2019</li>
            </ul>

            <h2>&nbsp;</h2>

            <h2>LAKIP</h2>

            <ul>
                <li><a href="https://drive.google.com/open?id=1ThqbS6yrO9y2D1V6MAuXsYjN44IdtL6n">Kebijakan SPM Bidang Pendidikan Dalam PP Nomor 2 Tahun 2018</a>, 14 Februari 2018</li>
                <li>&nbsp;<a href="https://drive.google.com/file/d/1Z9d3BBBO0589jyDnjyNUB0Nk-MPrXUji/view?usp=drive_open">Standar Pelayanan Minimal Dalam Perspektif UU Nomor 23 Tahun 2014 Tentang Pemerintahan Daerah</a>, 14 Februari 2018</li>
                <li><a href="https://drive.google.com/open?id=1pQz4AfHAXlW3DVpuL_0gc1lX_Fs6QrAE">Surat Penonaktifan NPSN</a>, 13 Maret 2019</li>
                <li><a href="https://drive.google.com/open?id=1yMjoPnKbDJQDX8VgXzW7f0rWvT8rlff1">Program Direktorat PGTK PAUD dan Dikmas 2019</a>, 28 Maret 2019</li>
            </ul>

            <h2>Perdirjen</h2>

            <ul>
                <li><a href="https://drive.google.com/open?id=1ThqbS6yrO9y2D1V6MAuXsYjN44IdtL6n">Kebijakan SPM Bidang Pendidikan Dalam PP Nomor 2 Tahun 2018</a>, 14 Februari 2018</li>
                <li><a href="https://drive.google.com/file/d/1Z9d3BBBO0589jyDnjyNUB0Nk-MPrXUji/view?usp=drive_open">Standar Pelayanan Minimal Dalam Perspektif UU Nomor 23 Tahun 2014 Tentang Pemerintahan Daerah</a>, 14 Februari 2018</li>
                <li><a href="https://drive.google.com/open?id=1pQz4AfHAXlW3DVpuL_0gc1lX_Fs6QrAE">Surat Penonaktifan NPSN</a>, 13 Maret 2019</li>
                <li><a href="https://drive.google.com/open?id=1yMjoPnKbDJQDX8VgXzW7f0rWvT8rlff1">Program Direktorat PGTK PAUD dan Dikmas 2019</a>, 28 Maret 2019</li>
            </ul>'
        ]);

    }
}
