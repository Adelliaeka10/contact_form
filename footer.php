<footer>
		<p>&copy; <span id="tahun"></span> Data Contact. </p>
		<script>
		// mengambil tanggal hari ini
		var now = new Date();
		var tahun = now.getFullYear();
		// menampilkan tahun di dalam elemen HTML
		document.getElementById("tahun").innerHTML = tahun;
		</script>
	
	</footer>

</body>
</html>