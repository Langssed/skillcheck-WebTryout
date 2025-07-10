<!DOCTYPE html>
<html>
<head>
    <title>Sertifikat Penghargaan</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Lato:wght@400;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <style>
        @page { 
            margin: 0;
        }
        body {
            margin: 0;
            font-family: 'Lato', sans-serif;
            color: #0D2A4C;
            background-color: #F8F8F8;
            background-image: url("{{ public_path('certificate-assets/certificate-bg.png') }}");
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            height: 100vh;
            position: relative;
        }

        .certificate-container {
            width: 85%;
            height: 80%;
            padding: 40px 60px;
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-55%, -50%);
            box-sizing: border-box;
        }

        .header-title {
            font-family: 'Playfair Display', serif;
            font-size: 52px;
            font-weight: 700;
            color: #0D2A4C;
            margin-bottom: 10px;
            letter-spacing: 2px;
        }

        .header-subtitle {
            font-family: 'Lato', sans-serif;
            font-size: 20px;
            font-weight: 400;
            text-transform: uppercase;
            letter-spacing: 4px;
            color: #B9975B;
            margin-bottom: 40px;
        }

        .intro-text {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .recipient-name {
            font-family: 'Great Vibes', cursive;
            font-size: 64px;
            color: #0D2A4C;
            margin: 10px 0;
            font-weight: 400;
        }

        .separator {
            border: 0;
            height: 1px;
            background: #B9975B;
            width: 30%;
            margin: 0 auto 25px auto;
        }

        .description {
            font-size: 17px;
            line-height: 1.6;
            margin-top: 20px;
            margin-bottom: 60px;
        }
        
        .description strong {
            font-weight: 700;
            color: #0D2A4C;
        }

        .signature-area {
            position: absolute;
            bottom: 120px;
            left: 60px;
            right: 60px;
            width: auto;
        }

        .signature-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .signature-cell {
            width: 33.33%;
            text-align: center;
            vertical-align: bottom;
            padding: 0 15px;
        }

        .signature-line {
            border-bottom: 1px solid #0D2A4C;
            height: 1px;
            margin-bottom: 8px;
        }

        .signature-name {
            font-weight: 700;
            font-size: 16px;
        }

        .signature-title {
            font-size: 14px;
            color: #555;
        }
        
        .official-seal {
            position: absolute;
            bottom: 110px;
            right: 60px;
            width: 100px;
            height: 100px;
            border: 3px solid #B9975B;
            border-radius: 50%;
            text-align: center;
            font-size: 12px;
            font-weight: bold;
            color: #B9975B;
            background-color: rgba(255, 255, 255, 0.8);
            
            padding-top: 32px; 
            box-sizing: border-box;
        }

        .certificate-footer {
            position: absolute;
            bottom: 40px;
            width: 100%;
            left: 0;
            text-align: center;
            font-size: 14px;
            color: #777;
        }

        .check {
            width: 40px;
            height: auto;
            margin-top: 10px;
        }

    </style>
</head>
<body>
    <div class="certificate-container">
        <div class="header-title">SERTIFIKAT</div>
        <div class="header-subtitle">PENGHARGAAN</div>
        <p class="intro-text">Dengan Bangga Diberikan Kepada:</p>
        <div class="recipient-name">{{ $user->name }}</div>
        <hr class="separator">
        <div class="description">
            Atas pencapaian luar biasa dalam menyelesaikan ujian<br>
            <strong>{{ $subject->name }}</strong> pada tingkat <strong>{{ $level->name }}</strong><br>
            dengan skor <strong>{{ $history->score }}/{{ $history->total_questions }} ({{ $history->persentage_score }}%)</strong>.
        </div>

        <div class="signature-area">
            <table class="signature-table">
                <tr>
                    <td class="signature-cell">
                        <div style="text-align: center; flex: 1;">
                            <img src="{{ public_path('img/anton.png') }}" alt="TTD Antonio" style="height: 80px; margin-bottom: 5px;">
                            <div style="border-top: 1px solid #000; width: 160px; margin: 0 auto 5px;"></div>
                            <div style="font-weight: bold;">Antonio Parlindungan S</div>
                            <div style="color: gray;">Chief Executive Officer</div>
                        </div>
                    </td>
                    <td class="signature-cell">
                        <div style="text-align: center; flex: 1;">
                            <img src="{{ public_path('img/elang.png') }}" alt="TTD Elang" style="height: 80px; margin-bottom: 5px;">
                            <div style="border-top: 1px solid #000; width: 160px; margin: 0 auto 5px;"></div>
                            <div style="font-weight: bold;">Elang Pacifico S</div>
                            <div style="color: gray;">Chief Executive Officer</div>
                        </div>
                    </td>
                    <td class="signature-cell">
                        <div style="text-align: center; flex: 1;">
                            <img src="{{ public_path('img/reiner.png') }}" alt="TTD Reiner" style="height: 80px; margin-bottom: 5px;">
                            <div style="border-top: 1px solid #000; width: 160px; margin: 0 auto 5px;"></div>
                            <div style="font-weight: bold;">Reiner Junistio U</div>
                            <div style="color: gray;">Chief Executive Officer</div>
                        </div>
                    </td>
                    </tr>
            </table>
        </div>
        
        <div class="official-seal">
            SKILLCHECK<br>VERIFIED
            <br>
            <img src="{{ public_path('img/check.png') }}" alt="cheked" class="check">
        </div>
        
        <div class="certificate-footer">
            Diterbitkan oleh <strong>Skillcheck</strong> pada tanggal {{ \Carbon\Carbon::parse($history->created_at)->translatedFormat('d F Y') }}
        </div>
    </div>
</body>
</html>