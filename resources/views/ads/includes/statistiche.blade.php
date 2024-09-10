<div class="statistics-container">


    @foreach ($statics as $stat)
        <div class="stat-row">
            <!-- Home Value -->
            <div class="stat-value">{{ $stat['home'] }}</div>

            <!-- Stat Bar -->
            <div class="stat-bar">
                @php
                    // Calculate the width for home and away bars
                    $maxValue = max($stat['home'], $stat['away']);
                    $homeWidth =
                        is_numeric($stat['home']) && is_numeric($stat['away']) ? ($stat['home'] / $maxValue) * 100 : 0;
                    $awayWidth =
                        is_numeric($stat['home']) && is_numeric($stat['away']) ? ($stat['away'] / $maxValue) * 100 : 0;
                @endphp
                <div class="stat-bar-fill 
                @if ($isHomeFiorentina) fiorentina-fill
                @else
                away-fill @endif

                "
                    style="width: {{ $homeWidth }}%;"></div>
                <div class="stat-bar-fill 
                @if (!$isHomeFiorentina) fiorentina-fill
                @else
                away-fill @endif
                
                "
                    style="width: {{ $awayWidth }}%;"></div>
            </div>

            <!-- Stat Label -->
            <div class="stat-label">{{ $stat['label'] }}</div>

            <!-- Away Value -->
            <div class="stat-value">{{ $stat['away'] }}</div>
        </div>
    @endforeach
</div>
