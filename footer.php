<?php
echo "<br>Existing users:<br>";
?>
<div id="users-table"></div>
<script>
    $(document).ready(() => {
        updateTable();
        setInterval(updateTable, 2000);
    });
</script>
</body>

</html>