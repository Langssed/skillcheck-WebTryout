<div>
      <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    <i class="fas fa-history mr-1"></i>
                    {{ $title }}
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home mr-1"></i> Dashboard</a></li>
                <li class="breadcrumb-item active"><i class="fas fa-history mr-1"></i>{{ $title }}</li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="card">
    <div class="card-header">
        <h3 class="card-title">Riwayat Pengerjaan</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tingkat</th>
                            <th>Mata Pelajaran</th>
                            <th>Total Soal</th>
                            {{-- <th>Jawaban Benar</th> --}}
                            <th>Skor</th>
                            <th>Persentase</th>
                            <th>Sertifikat</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($histories as $index => $history)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $history->level->name }}</td>
                            <td>{{ $history->subject->name }}</td>
                            <td>{{ $history->total_questions }}</td>
                            {{-- <td>{{ $history->correct_answer }}</td> --}}
                            <td>{{ $history->score }}</td>
                            <td>{{ $history->persentage_score }}%</td>
                            <td>
                                @if ($history->certificate_url)
                                    <a href="{{ asset('storage/' . $history->certificate_url) }}" class="btn btn-sm btn-success" target="_blank">
                                        <i class="fas fa-download"></i> Unduh
                                    </a>
                                @else
                                    <span class="badge badge-secondary">-</span>
                                @endif
                            </td>
                            <td>{{ $history->created_at->format('d-m-Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card">
            
        </div>

    </section>
    </div>
    <!-- /.content-wrapper -->
</div>