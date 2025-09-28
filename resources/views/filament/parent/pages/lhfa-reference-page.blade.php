<x-filament-panels::page>
    <style>
        .page-container {
            padding: 0;
            margin: 0;
        }
        
        .section-spacing {
            margin-bottom: 48px;
        }
        
        .table-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            border: 2px solid #93c5fd;
            overflow: hidden;
        }
        
        .table-container.girls {
            border-color: #f9a8d4;
        }
        
        .table-header {
            padding: 24px 32px;
            background: linear-gradient(90deg, #dbeafe 0%, #bfdbfe 100%);
            border-bottom: 2px solid #93c5fd;
        }
        
        .table-header.girls {
            background: linear-gradient(90deg, #fce7f3 0%, #fbcfe8 100%);
            border-bottom-color: #f9a8d4;
        }
        
        .table-title {
            font-size: 20px;
            font-weight: bold;
            color: #1e3a8a;
            display: flex;
            align-items: center;
            margin-bottom: 8px;
        }
        
        .table-title.girls {
            color: #831843;
        }
        
        .gender-icon {
            width: 32px;
            height: 32px;
            background: #2563eb;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            font-size: 14px;
            font-weight: bold;
        }
        
        .gender-icon.girls {
            background: #db2777;
        }
        
        .table-subtitle {
            font-size: 14px;
            color: #1d4ed8;
            font-weight: 500;
        }
        
        .table-subtitle.girls {
            color: #be185d;
        }
        
        .table-wrapper {
            overflow-x: auto;
        }
        
        .data-table {
            width: 100%;
            border-collapse: collapse;
            border: 2px solid #6b7280;
        }
        
        .table-head {
            background: #f9fafb;
        }
        
        .table-head.girls {
            background: linear-gradient(90deg, #f3f4f6 0%, #f9fafb 100%);
        }
        
        .header-cell {
            padding: 16px;
            text-align: center;
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border: 2px solid #6b7280;
        }
        
        .header-cell.age-col {
            text-align: left;
            background: #f3f4f6;
        }
        
        .header-cell.red { color: #dc2626; }
        .header-cell.orange { color: #ea580c; }
        .header-cell.yellow { color: #d97706; }
        .header-cell.green { color: #059669; }
        
        .header-cell.orange.highlight {
            background: #fed7aa;
        }
        
        .header-cell.green.highlight {
            background: #d1fae5;
        }
        
        .table-body {
            background: white;
        }
        
        .table-row {
            transition: all 0.2s ease;
        }
        
        .table-row:hover {
            background: #dbeafe;
        }
        
        .table-row.girls:hover {
            background: #fce7f3;
        }
        
        .data-cell {
            padding: 16px;
            text-align: center;
            font-size: 14px;
            font-weight: 600;
            border: 2px solid #6b7280;
        }
        
        .data-cell.age-col {
            text-align: left;
            font-weight: bold;
            background: #f3f4f6;
            color: #111827;
        }
        
        .data-cell.red { color: #dc2626; }
        .data-cell.orange { color: #ea580c; }
        .data-cell.yellow { color: #d97706; }
        .data-cell.green { color: #059669; font-weight: bold; }
        
        .data-cell.orange.highlight {
            background: #fed7aa;
        }
        
        .data-cell.green.highlight {
            background: #d1fae5;
        }
        
        .info-section {
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            border: 2px solid #d1d5db;
            padding: 32px;
            margin-top: 64px;
        }
        
        .info-header {
            display: flex;
            align-items: center;
            margin-bottom: 32px;
        }
        
        .info-icon {
            width: 32px;
            height: 32px;
            background: #2563eb;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 16px;
            font-size: 14px;
            font-weight: bold;
        }
        
        .info-title {
            font-size: 24px;
            font-weight: bold;
            color: #111827;
        }
        
        .legend-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 32px;
            margin-bottom: 24px;
        }
        
        .legend-column {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }
        
        .legend-item {
            display: flex;
            align-items: flex-start;
            padding: 16px 20px;
            border-radius: 12px;
            border-left: 6px solid;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .legend-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }
        
        .legend-item::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 40px;
            height: 40px;
            opacity: 0.1;
            border-radius: 50%;
            transform: translate(15px, -15px);
        }
        
        .legend-item.red {
            background: linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%);
            border-left-color: #dc2626;
        }
        
        .legend-item.red::before {
            background: #dc2626;
        }
        
        .legend-item.orange {
            background: linear-gradient(135deg, #fff7ed 0%, #fed7aa 100%);
            border-left-color: #ea580c;
        }
        
        .legend-item.orange::before {
            background: #ea580c;
        }
        
        .legend-item.yellow {
            background: linear-gradient(135deg, #fefce8 0%, #fef3c7 100%);
            border-left-color: #d97706;
        }
        
        .legend-item.yellow::before {
            background: #d97706;
        }
        
        .legend-item.green {
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
            border-left-color: #059669;
        }
        
        .legend-item.green::before {
            background: #059669;
        }
        
        .legend-color {
            width: 20px;
            height: 20px;
            border-radius: 6px;
            margin-right: 16px;
            flex-shrink: 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .legend-content {
            flex: 1;
        }
        
        .legend-color.red { background: #dc2626; }
        .legend-color.orange { background: #ea580c; }
        .legend-color.yellow { background: #d97706; }
        .legend-color.green { background: #059669; }
        
        .legend-label {
            font-weight: 700;
            font-size: 16px;
            display: block;
            margin-bottom: 6px;
            letter-spacing: 0.5px;
        }
        
        .legend-label.red { color: #dc2626; }
        .legend-label.orange { color: #ea580c; }
        .legend-label.yellow { color: #d97706; }
        .legend-label.green { color: #059669; }
        
        .legend-desc {
            font-size: 14px;
            line-height: 1.5;
            font-weight: 500;
        }
        
        .legend-desc.red { color: #b91c1c; }
        .legend-desc.orange { color: #c2410c; }
        .legend-desc.yellow { color: #b45309; }
        .legend-desc.green { color: #047857; }
        
        .alert-box {
            margin-top: 40px;
            padding: 28px;
            background: linear-gradient(135deg, #fff7ed 0%, #fed7aa 50%, #fb923c 100%);
            border: 3px solid #fdba74;
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(251, 146, 60, 0.2);
            position: relative;
        }
        
        .alert-box::before {
            content: '';
            position: absolute;
            top: -3px;
            left: -3px;
            right: -3px;
            bottom: -3px;
            background: linear-gradient(135deg, #f97316, #ea580c);
            border-radius: 16px;
            z-index: -1;
            opacity: 0.1;
        }
        
        .alert-content {
            display: flex;
            align-items: flex-start;
        }
        
        .alert-icon {
            width: 32px;
            height: 32px;
            background: #ea580c;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 16px;
            font-size: 14px;
            font-weight: bold;
            flex-shrink: 0;
        }
        
        .alert-title {
            font-weight: 800;
            color: #7c2d12;
            margin-bottom: 16px;
            font-size: 20px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }
        
        .alert-text {
            font-size: 15px;
            color: #9a3412;
            margin-bottom: 12px;
            line-height: 1.6;
            font-weight: 500;
        }
        
        .reference-section {
            margin-top: 40px;
            padding: 24px;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            border-radius: 12px;
            border: 2px solid #cbd5e1;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.06);
        }
        
        .reference-text {
            font-size: 15px;
            color: #475569;
            display: flex;
            align-items: center;
            margin-bottom: 16px;
            font-weight: 600;
        }
        
        .reference-icon {
            width: 28px;
            height: 28px;
            background: linear-gradient(135deg, #64748b, #475569);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 14px;
            font-size: 14px;
            font-weight: bold;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .reference-note {
            font-size: 14px;
            color: #64748b;
            margin-left: 42px;
            line-height: 1.6;
            font-style: italic;
            font-weight: 500;
        }
        
        .header-label {
            font-size: 12px;
            font-weight: normal;
            text-transform: none;
        }
    </style>
    <div class="page-container">
        <!-- Tabel Laki-laki -->
        <div class="table-container section-spacing">
            <div class="table-header">
                <h3 class="table-title">
                    <span class="gender-icon">♂</span>
                    Acuan Tinggi Badan Laki-laki
                </h3>
                <p class="table-subtitle">Standar WHO untuk anak laki-laki (cm)</p>
            </div>
            <div class="table-wrapper">
                <table class="data-table">
                    <thead class="table-head">
                        <tr>
                            <th class="header-cell age-col">
                                Umur
                            </th>
                            <th class="header-cell red">
                                -3 SD<br><span class="header-label">Sangat Pendek</span>
                            </th>
                            <th class="header-cell orange highlight">
                                -2 SD<br><span class="header-label">Stunting</span>
                            </th>
                            <th class="header-cell yellow">
                                -1 SD<br><span class="header-label">Normal Rendah</span>
                            </th>
                            <th class="header-cell green highlight">
                                Median<br><span class="header-label">Ideal</span>
                            </th>
                            <th class="header-cell yellow">
                                +1 SD<br><span class="header-label">Normal Tinggi</span>
                            </th>
                            <th class="header-cell orange">
                                +2 SD<br><span class="header-label">Tinggi</span>
                            </th>
                            <th class="header-cell red">
                                +3 SD<br><span class="header-label">Sangat Tinggi</span>
                            </th>
                        </tr>
                    </thead>
                                        <tbody class="table-body">
                        @foreach($this->getBoysData() as $data)
                            <tr class="table-row">
                                <td class="data-cell age-col">
                                    {{ $data->age }}
                                </td>
                                <td class="data-cell red">
                                    {{ $data->sd3neg }}
                                </td>
                                <td class="data-cell orange highlight">
                                    {{ $data->sd2neg }}
                                </td>
                                <td class="data-cell yellow">
                                    {{ $data->sd1neg }}
                                </td>
                                <td class="data-cell green highlight">
                                    {{ $data->median }}
                                </td>
                                <td class="data-cell yellow">
                                    {{ $data->sd1 }}
                                </td>
                                <td class="data-cell orange">
                                    {{ $data->sd2 }}
                                </td>
                                <td class="data-cell red">
                                    {{ $data->sd3 }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tabel Perempuan -->
        <div class="table-container girls section-spacing">
            <div class="table-header girls">
                <h3 class="table-title girls">
                    <span class="gender-icon girls">♀</span>
                    Acuan Tinggi Badan Perempuan
                </h3>
                <p class="table-subtitle girls">Standar WHO untuk anak perempuan (cm)</p>
            </div>
            <div class="table-wrapper">
                <table class="data-table">
                    <thead class="table-head girls">
                        <tr>
                            <th class="header-cell age-col">
                                Umur
                            </th>
                            <th class="header-cell red">
                                -3 SD<br><span class="header-label">Sangat Pendek</span>
                            </th>
                            <th class="header-cell orange highlight">
                                -2 SD<br><span class="header-label">Stunting</span>
                            </th>
                            <th class="header-cell yellow">
                                -1 SD<br><span class="header-label">Normal Rendah</span>
                            </th>
                            <th class="header-cell green highlight">
                                Median<br><span class="header-label">Ideal</span>
                            </th>
                            <th class="header-cell yellow">
                                +1 SD<br><span class="header-label">Normal Tinggi</span>
                            </th>
                            <th class="header-cell orange">
                                +2 SD<br><span class="header-label">Tinggi</span>
                            </th>
                            <th class="header-cell red">
                                +3 SD<br><span class="header-label">Sangat Tinggi</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="table-body">
                        @foreach($this->getGirlsData() as $data)
                            <tr class="table-row girls">
                                <td class="data-cell age-col">
                                    {{ $data->age }}
                                </td>
                                <td class="data-cell red">
                                    {{ $data->sd3neg }}
                                </td>
                                <td class="data-cell orange highlight">
                                    {{ $data->sd2neg }}
                                </td>
                                <td class="data-cell yellow">
                                    {{ $data->sd1neg }}
                                </td>
                                <td class="data-cell green highlight">
                                    {{ $data->median }}
                                </td>
                                <td class="data-cell yellow">
                                    {{ $data->sd1 }}
                                </td>
                                <td class="data-cell orange">
                                    {{ $data->sd2 }}
                                </td>
                                <td class="data-cell red">
                                    {{ $data->sd3 }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Informasi dan Keterangan -->
        <div class="info-section">
            <div class="info-header">
                <span class="info-icon">ℹ</span>
                <h4 class="info-title">Interpretasi Standar Deviasi</h4>
            </div>

            <div class="legend-grid">
                <div class="legend-column">
                    <div class="legend-item red">
                        <div class="legend-color red"></div>
                        <div class="legend-content">
                            <span class="legend-label red">-3 SD / +3 SD</span>
                            <p class="legend-desc red">Sangat Pendek / Sangat Tinggi</p>
                        </div>
                    </div>
                    <div class="legend-item orange">
                        <div class="legend-color orange"></div>
                        <div class="legend-content">
                            <span class="legend-label orange">-2 SD / +2 SD</span>
                            <p class="legend-desc orange"><strong>Stunting</strong> / Tinggi</p>
                        </div>
                    </div>
                </div>
                <div class="legend-column">
                    <div class="legend-item yellow">
                        <div class="legend-color yellow"></div>
                        <div class="legend-content">
                            <span class="legend-label yellow">-1 SD / +1 SD</span>
                            <p class="legend-desc yellow">Normal Rendah / Normal Tinggi</p>
                        </div>
                    </div>
                    <div class="legend-item green">
                        <div class="legend-color green"></div>
                        <div class="legend-content">
                            <span class="legend-label green">Median</span>
                            <p class="legend-desc green">Tinggi Badan Ideal</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Special Stunting Alert -->
            <div class="alert-box">
                <div class="alert-content">
                    <span class="alert-icon">⚠</span>
                    <div>
                        <h5 class="alert-title">Perhatian Khusus: Stunting</h5>
                        <p class="alert-text">
                            <strong>Stunting</strong> adalah kondisi gagal tumbuh pada anak akibat kekurangan gizi
                            kronis yang terjadi dalam 1000 hari pertama kehidupan.
                        </p>
                        <p class="alert-text">
                            Anak dikategorikan <strong>stunting</strong> jika tinggi badannya berada di bawah <strong>-2
                                SD</strong> dari standar WHO.
                        </p>
                    </div>
                </div>
            </div>

            <div class="reference-section">
                <p class="reference-text">
                    <span class="reference-icon">📚</span>
                    <strong>Referensi:</strong> Standar WHO untuk Length/Height-for-Age (LHFA) anak usia 0-60 bulan
                </p>
                <p class="reference-note">
                    SD = Standard Deviation (Standar Deviasi). Nilai ini digunakan untuk menentukan status pertumbuhan
                    tinggi badan anak sesuai umur.
                </p>
            </div>
        </div>
    </div>
</x-filament-panels::page>