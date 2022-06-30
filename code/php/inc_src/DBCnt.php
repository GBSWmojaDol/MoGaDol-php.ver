<?php 
    $conn = mysqli_connect('localhost', 'mojadol', '1029', 'mojadol') or die('fail2');
?>
<link rel="manifest" href="/manifest.json">
<script type="module">
    
import 'https://cdn.jsdelivr.net/npm/@pwabuilder/pwaupdate';

const el = document.createElement('pwa-update');
document.body.appendChild(el);
</script>
