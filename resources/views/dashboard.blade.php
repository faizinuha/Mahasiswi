<x-app-layout>
    <x-slot name="title">
        Dashboard
    </x-slot>

    <x-slot name="header">
        <h2 class="text-center font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <x-slot name="componen">
    <div class="p-6">
        <div class="bg-white shadow-md rounded-lg p-4 mb-6">
            <h3 class="text-lg font-semibold">Seoul National University (SNU)</h3>
            <ul class="list-disc pl-6">
                <li>
                    <strong>Informasi Umum</strong>
                    <ul class="list-disc pl-6">
                        <li>Lokasi: Seoul</li>
                        <li>Dibangun: 1946</li>
                        <li>Program Studi Terkenal: Teknik, Ilmu Pengetahuan Alam, Ekonomi, dan Bisnis</li>
                        <li><a href="https://www.snu.ac.kr" target="_blank" class="text-blue-500 hover:underline">Website SNU</a></li>
                        <li><img src="https://titiknolenglish.com/wp-content/uploads/2023/09/Seoul-National-University-Profil-Universitas-Ternama-di-Korea-Selatan-21.webp" alt="SNU" width="200" class="mt-4 rounded"></li>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="bg-white shadow-md rounded-lg p-4 mb-6">
            <h3 class="text-lg font-semibold">Persyaratan Pendaftaran untuk Mahasiswa Internasional</h3>
            <ul class="list-disc pl-6">
                <li>
                    <strong>Dokumen yang Dibutuhkan:</strong>
                    <ul class="list-disc pl-6">
                        <li>Formulir aplikasi yang telah diisi</li>
                        <li>Salinan paspor</li>
                        <li>Transkrip akademik dan sertifikat kelulusan</li>
                        <li>Bukti kemampuan bahasa (TOEFL, IELTS untuk bahasa Inggris; TOPIK untuk bahasa Korea)</li>
                        <li>Surat rekomendasi</li>
                        <li>Esai atau surat motivasi</li>
                    </ul>
                </li>
                <li>
                    <strong>Persyaratan Bahasa:</strong>
                    <ul class="list-disc pl-6">
                        <li>Skor TOEFL atau IELTS untuk program berbahasa Inggris</li>
                        <li>Skor TOPIK untuk program berbahasa Korea</li>
                    </ul>
                </li>
                <li>
                    <strong>Prosedur Aplikasi:</strong>
                    <ul class="list-disc pl-6">
                        <li>Aplikasi online melalui situs web universitas</li>
                        <li>Pembayaran biaya pendaftaran (bervariasi tergantung universitas)</li>
                        <li>Wawancara (untuk beberapa program)</li>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="bg-white shadow-md rounded-lg p-4 mb-6">
            <h3 class="text-lg font-semibold">Beasiswa untuk Mahasiswa Internasional</h3>
            <ul class="list-disc pl-6">
                <li>
                    <strong>Global Korea Scholarship (GKS):</strong>
                    <ul class="list-disc pl-6">
                        <li>Biaya kuliah penuh, tunjangan bulanan, tiket pesawat, dan biaya lainnya</li>
                        <li>Terbuka untuk semua mahasiswa internasional di berbagai jenjang pendidikan</li>
                    </ul>
                </li>
                <li>
                    <strong>Beasiswa Khusus Universitas:</strong>
                    <ul class="list-disc pl-6">
                        <li>Banyak universitas menawarkan beasiswa berdasarkan prestasi akademik, kemampuan bahasa, dan kebutuhan finansial</li>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="bg-white shadow-md rounded-lg p-4 mb-6">
            <h3 class="text-lg font-semibold">Tips untuk Mahasiswa Internasional</h3>
            <ul class="list-disc pl-6">
                <li>Pelajari Bahasa Korea: Meskipun banyak program yang ditawarkan dalam bahasa Inggris, kemampuan bahasa Korea akan sangat membantu dalam kehidupan sehari-hari.</li>
                <li>Bergabung dengan Komunitas Mahasiswa Internasional: Ini dapat membantu dalam adaptasi budaya dan membangun jaringan sosial.</li>
                <li>Periksa Visa dan Asuransi: Pastikan untuk memiliki visa yang sesuai dan asuransi kesehatan selama belajar di Korea.</li>
            </ul>
        </div>
    </div>
</x-slot>
</x-app-layout>
