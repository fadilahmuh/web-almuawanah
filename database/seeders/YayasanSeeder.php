<?php

namespace Database\Seeders;

use App\Models\Component;
use App\Models\Galeri;
use Illuminate\Database\Seeder;

class YayasanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // Default Banner
        Component::create([
            'divisi' => 'Yayasan',
            'bagian' => 'banner',
            'judul' => 'Default Banner',
            'content' => 'Ini Merupakan Default Banner, Silahkan Edit di halaman admin',
            'attachment' => 'default_pict1.jpg'
        ]);

        // Default Sambutan
        Component::create([
            'divisi' => 'Yayasan',
            'bagian' => 'sambutan',
            'judul' => 'بِسْمِ اللهِ الرَّحْمٰنِ الرَّحِيْمِ',
            'content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestias eum in molestiae inventore, suscipit accusantium itaque tempore voluptatem natus optio asperiores dignissimos amet, reiciendis aspernatur earum. Facilis doloremque temporibus quod?',
            'attachment' => 'default_pict3.jpg',
            'desc1' => 'Hj. Alivian Alvarez',
            'desc2' => "Pimpinan Yayasan Al-Mu'awanah"
        ]);

        // Deskripsi Singkat
        Component::create([
            'divisi' => 'Yayasan',
            'bagian' => 'deskripsi-singkat',
            'content' => 'Ini merupakan isi dari deskripsi singkat, silahkan ganti di halaman Admin.Ini merupakan isi dari deskripsi singkat, silahkan ganti di halaman Admin.',
            'attachment' => 'default_pict2.jpg',
        ]);

        // Default Brosur
        Component::create([
            'divisi' => 'Yayasan',
            'bagian' => 'brosur',
            'judul' => 'Brosur 1',
            'content' => 'Contoh Brosur 1',
            'attachment' => 'default-brosur1.jpg'
        ]);

        Component::create([
            'divisi' => 'Yayasan',
            'bagian' => 'brosur',
            'judul' => 'Brosur 2',
            'content' => 'Contoh Brosur 2',
            'attachment' => 'default-brosur1.jpg'
        ]);

        Component::create([
            'divisi' => 'Yayasan',
            'bagian' => 'brosur',
            'judul' => 'Brosur 3',
            'content' => 'Contoh Brosur 3',
            'attachment' => 'default-brosur1.jpg'
        ]);

        // Default Profile
        Component::create([
            'divisi' => 'Yayasan',
            'bagian' => 'tentang',
            'content' => '<p>Ini merupakan bagian Profil-Tentang&nbsp; Kami, silahkan edit di halaman admin.&nbsp;<span style="background-color: transparent;">Ini merupakan bagian Profil-Tentang&nbsp; Kami, silahkan edit di halaman admin.&nbsp;</span><span style="background-color: transparent;">Ini merupakan bagian Profil-Tentang&nbsp; Kami, silahkan edit di halaman admin.&nbsp;</span><span style="background-color: transparent;">Ini merupakan bagian Profil-Tentang&nbsp; Kami, silahkan edit di halaman admin.&nbsp;</span><span style="background-color: transparent;">Ini merupakan bagian Profil-Tentang&nbsp; Kami, silahkan edit di halaman admin.&nbsp;</span><span style="background-color: transparent;">Ini merupakan bagian Profil-Tentang&nbsp; Kami, silahkan edit di halaman admin.&nbsp;</span><span style="background-color: transparent;">Ini merupakan bagian Profil-Tentang&nbsp; Kami, silahkan edit di halaman admin.&nbsp;</span><span style="background-color: transparent;">Ini merupakan bagian Profil-Tentang&nbsp; Kami, silahkan edit di halaman admin.&nbsp;</span><span style="background-color: transparent;">Ini merupakan bagian Profil-Tentang&nbsp; Kami, silahkan edit di halaman admin.&nbsp;</span><span style="background-color: transparent;">Ini merupakan bagian Profil-Tentang&nbsp; Kami, silahkan edit di halaman admin.&nbsp;</span><span style="background-color: transparent;">Ini merupakan bagian Profil-Tentang&nbsp; Kami, silahkan edit di halaman admin.&nbsp;</span><span style="background-color: transparent;">Ini merupakan bagian Profil-Tentang&nbsp; Kami, silahkan edit di halaman admin.&nbsp;</span></p>'
        ]);

        Component::create([
            'divisi' => 'Yayasan',
            'bagian' => 'visi',
            'content' => '<p>Ini merupakan bagian Profil-<b>Visi</b>, silahkan edit di halaman admin.&nbsp;<span style="background-color: transparent;">Ini merupakan bagian Profil-</span><span style="background-color: transparent; font-weight: bolder;">Visi</span><span style="background-color: transparent;">, silahkan edit di halaman admin.&nbsp;</span><span style="background-color: transparent;">Ini merupakan bagian Profil-</span><span style="background-color: transparent; font-weight: bolder;">Visi</span><span style="background-color: transparent;">, silahkan edit di halaman admin.&nbsp;</span><span style="background-color: transparent;">Ini merupakan bagian Profil-</span><span style="background-color: transparent; font-weight: bolder;">Visi</span><span style="background-color: transparent;">, silahkan edit di halaman admin.&nbsp;</span><span style="background-color: transparent;">Ini merupakan bagian Profil-</span><span style="background-color: transparent; font-weight: bolder;">Visi</span><span style="background-color: transparent;">, silahkan edit di halaman admin.&nbsp;</span><span style="background-color: transparent;">Ini merupakan bagian Profil-</span><span style="background-color: transparent; font-weight: bolder;">Visi</span><span style="background-color: transparent;">, silahkan edit di halaman admin.&nbsp;</span><span style="background-color: transparent;">Ini merupakan bagian Profil-</span><span style="background-color: transparent; font-weight: bolder;">Visi</span><span style="background-color: transparent;">, silahkan edit di halaman admin.&nbsp;</span><span style="background-color: transparent;">Ini merupakan bagian Profil-</span><span style="background-color: transparent; font-weight: bolder;">Visi</span><span style="background-color: transparent;">, silahkan edit di halaman admin.&nbsp;</span><span style="background-color: transparent;">Ini merupakan bagian Profil-</span><span style="background-color: transparent; font-weight: bolder;">Visi</span><span style="background-color: transparent;">, silahkan edit di halaman admin.&nbsp;</span></p>',
        ]);

        Component::create([
            'divisi' => 'Yayasan',
            'bagian' => 'misi',
            'content' => '<p>Ini merupakan bagian Profil-<span style="font-weight: bolder;">Misi</span>, silahkan edit di halaman admin.&nbsp;<span style="background-color: transparent;">Ini merupakan bagian Profil-</span><span style="background-color: transparent; font-weight: bolder;">Misi</span><span style="background-color: transparent;">, silahkan edit di halaman admin.&nbsp;</span></p><ul><li><span style="background-color: transparent;">Ini merupakan bagian Profil-<span style="font-weight: bolder;">Misi</span>, silahkan edit di halaman admin.&nbsp;</span></li><li><span style="background-color: transparent;">Ini merupakan bagian Profil-<span style="font-weight: bolder;">Misi</span>, silahkan edit di halaman admin.&nbsp;</span></li><li><span style="background-color: transparent;">Ini merupakan bagian Profil-<span style="font-weight: bolder;">Misi</span>, silahkan edit di halaman admin.&nbsp;<br></span><br></li></ul>',
        ]);

        Galeri::create([
            'divisi' => 'Yayasan',
            'judul' => 'Default 1',
            'cation' => 'Beri Deskripsi',
            'attachment' => 'default_pict2.jpg',
        ]);

        Galeri::create([
            'divisi' => 'Yayasan',
            'judul' => 'Default 1',
            'cation' => 'Beri Deskripsi',
            'attachment' => 'default_pict2.jpg',
        ]);

        Galeri::create([
            'divisi' => 'Yayasan',
            'judul' => 'Default 1',
            'cation' => 'Beri Deskripsi',
            'attachment' => 'default_pict2.jpg',
        ]);

        Galeri::create([
            'divisi' => 'Yayasan',
            'judul' => 'Default 1',
            'cation' => 'Beri Deskripsi',
            'attachment' => 'default_pict2.jpg',
        ]);

        Galeri::create([
            'divisi' => 'Yayasan',
            'judul' => 'Default 1',
            'cation' => 'Beri Deskripsi',
            'attachment' => 'default_pict2.jpg',
        ]);

        Galeri::create([
            'divisi' => 'Yayasan',
            'judul' => 'Default 1',
            'cation' => 'Beri Deskripsi',
            'attachment' => 'default_pict2.jpg',
        ]);
        
        Component::create([
            'divisi' => 'Yayasan',
            'bagian' => 'youtube',
            'content' => 'UCg8r6lAzXP9OCyR0G1uBewg',
        ]);

        Component::create([
            'divisi' => 'Yayasan',
            'bagian' => 'youtube_single',
            'content' => 'https://www.youtube.com/watch?v=5HfCScWbJOs',
        ]);

        Component::create([
            'divisi' => 'Yayasan',
            'bagian' => 'galeri_setting',
            'content' => '6',
        ]);

        //Default Kontak
        Component::create([
            'divisi' => 'Yayasan',
            'bagian' => 'kontak',
            'judul' => 'Whatsapp',
            'content' => '08123456789',
            'desc1' => 'Alifian'
        ]);

        Component::create([
            'divisi' => 'Yayasan',
            'bagian' => 'kontak',
            'judul' => 'Email',
            'content' => 'almuawanah@test.com',
            'desc1' => 'Tata Usaha'
        ]);

        Component::create([
            'divisi' => 'Yayasan',
            'bagian' => 'kontak',
            'judul' => 'Telepon',
            'content' => '0211568943219',
            'desc1' => 'Kantor'
        ]);

        Component::create([
            'divisi' => 'Yayasan',
            'bagian' => 'kontak',
            'judul' => 'Alamat',
            'content' => 'Jl. PH.H. Mustofa No.23, Neglasari, Kec. Cibeunying Kaler, Kota Bandung, Jawa Barat 40124',
            'desc1' => 'Kantor Utama'
        ]);
    }
}
