Status Traffic Upload (RX) = {{ formatBytes($rx, 2) }}<br>
Status Traffic Download (TX) = {{ formatBytes($tx, 2) }}<br>

@php function formatBytes($bytes, $decimal = null){
    $satuan = ['Bytes', 'Kb', 'Mb', 'Gb', 'Tb'];
    $i = 0;
    while ($bytes > 1024) {
        $bytes /= 1024;
        $i++;
    }
    return round($bytes, $decimal) .'-' . $satuan[$i];
}
@endphp
