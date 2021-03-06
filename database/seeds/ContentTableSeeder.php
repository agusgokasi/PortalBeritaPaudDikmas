<?php

use Illuminate\Database\Seeder;

class ContentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //sample news
        DB::table('contents')->insert([
            'category_id' => 1,
            'is_news' => 1,
            'title' => 'Tantangan Abad 21 Bidang Pendidikan Anak Usia Dini',
            'description' => 'Batam, PAUD dan Dikmas. ”Pendidikan sangat penting untuk menyelaraskan antara kebutuhan tenaga kerja dan industri yang berbasis digital. Harus tercipta kesadaran bersama antara Pemerintah, dunia ...',
            'content' => '
            <p>Batam, PAUD dan Dikmas. &rdquo;Pendidikan sangat penting untuk menyelaraskan antara kebutuhan tenaga kerja dan industri yang berbasis digital. Harus tercipta kesadaran bersama antara Pemerintah, dunia usaha maupun masyarakat,&rdquo; ujar Sekertaris Direktorat Jenderal Pendidikan Anak Usia Dini dan Pendidikan Masyarakat (Sesditjen PAUD dan Dikmas) Wartanto, saat kegiatan Sosialisasi Sistem Perizinan Daring/Online, Jum&rsquo;at (23/08).</p>

			<p>Dijelaskan oleh Wartanto setiap anak mempunyai jenjang dan jenis pendidikan, sesuai dengan umurnya masing-masing. Umur 0-2 tahun adalah masa pembimbingan, umur 3-4 tahun masa bermain, umur 5-6 tahun masa Prasekolah, umur 7-12 tahun masa Pendidikan Dasar, umur 13-15 masa tahun Pendidikan Menengah Pertama, dan umur 16-18 masa pendidikan Menengah Atas,&quot; ujar Wartanto.</p>

			<p>Wartanto juga menjelaskan pentingnya pendidikan anak usia dini yang merupakan tolak ukur kemakmuran bangsa di masa depan. Menurutnya penanaman nilai sejak anak usia dini menjadi hal yang sangat krusial, agar tidak terjadi krisis moral bagi anak-anak bangsa di masa yang akan datang. (Tim Warta/AS/ARJ/KS)</p>',
            'banner' => 'bannerberita.JPG',
            'status' => 2,
            'created_by' => 3,
            'updated_by' => 4,
            'created_at' => '2019-09-03 21:38:55',
            'updated_at' => '2019-09-03 21:41:50',
        ]);
        //duplicated news
        DB::table('contents')->insert([
            'category_id' => 1,
            'is_news' => 1,
            'title' => 'Tantangan Abad 21 Bidang Pendidikan Anak Usia Dini',
            'description' => 'Batam, PAUD dan Dikmas. ”Pendidikan sangat penting untuk menyelaraskan antara kebutuhan tenaga kerja dan industri yang berbasis digital. Harus tercipta kesadaran bersama antara Pemerintah, dunia ...',
            'content' => '
            <p>Batam, PAUD dan Dikmas. &rdquo;Pendidikan sangat penting untuk menyelaraskan antara kebutuhan tenaga kerja dan industri yang berbasis digital. Harus tercipta kesadaran bersama antara Pemerintah, dunia usaha maupun masyarakat,&rdquo; ujar Sekertaris Direktorat Jenderal Pendidikan Anak Usia Dini dan Pendidikan Masyarakat (Sesditjen PAUD dan Dikmas) Wartanto, saat kegiatan Sosialisasi Sistem Perizinan Daring/Online, Jum&rsquo;at (23/08).</p>

			<p>Dijelaskan oleh Wartanto setiap anak mempunyai jenjang dan jenis pendidikan, sesuai dengan umurnya masing-masing. Umur 0-2 tahun adalah masa pembimbingan, umur 3-4 tahun masa bermain, umur 5-6 tahun masa Prasekolah, umur 7-12 tahun masa Pendidikan Dasar, umur 13-15 masa tahun Pendidikan Menengah Pertama, dan umur 16-18 masa pendidikan Menengah Atas,&quot; ujar Wartanto.</p>

			<p>Wartanto juga menjelaskan pentingnya pendidikan anak usia dini yang merupakan tolak ukur kemakmuran bangsa di masa depan. Menurutnya penanaman nilai sejak anak usia dini menjadi hal yang sangat krusial, agar tidak terjadi krisis moral bagi anak-anak bangsa di masa yang akan datang. (Tim Warta/AS/ARJ/KS)</p>',
            'banner' => 'bannerberita.JPG',
            'status' => 8,
            'created_by' => 3,
            'updated_by' => 4,
            'created_at' => '2019-09-03 21:39:00',
            'updated_at' => '2019-09-03 21:39:00',
        ]);
        //sample headline
        DB::table('contents')->insert([
            'category_id' => 1,
            'is_headline' => 1,
            'title' => 'Tes',
            'content' => '<p>Tes</p>',
            'banner' => 'bannerheadline.jpeg',
            'status' => 2,
            'created_by' => 3,
            'updated_by' => 4,
            'created_at' => '2019-09-03 21:36:36',
            'updated_at' => '2019-09-03 21:42:00',
        ]);
        //sample gallery
        DB::table('contents')->insert([
            'category_id' => 1,
            'is_gallery' => 1,
            'title' => 'Tes',
            'description' => '<p>Tes</p>',
            'banner' => 'bannergaleri.jpeg',
            'status' => 2,
            'created_by' => 3,
            'updated_by' => 4,
            'created_at' => '2019-09-03 21:39:34',
            'updated_at' => '2019-09-03 21:42:10',
        ]);
    }
}
