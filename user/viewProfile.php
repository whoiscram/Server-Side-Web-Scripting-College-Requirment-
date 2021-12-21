<?php
	require_once '../admin/config.php';
	session_start();
?>

<html lang="en">

<head>
	<meta charset="UTF-8">
	<link href="../styles/style.css" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script>
		$(document).ready(function () {
			$(".btn-success").click(function () {
				var eventId = $(this).attr('id');
				var ajaxurl = 'viewProfile.php';
				data = {
					'leave': eventId
				};
				$.post(ajaxurl, data);
				location.reload();
			});
		});
	</script>

	<title>Welcome</title>
</head>

<body>
	<div class="nav">
		<nav>
			<ul>
				<li><a href="home.php">HOME</a></li>
				<li><a href="home.php">CONCERTS</a></li>
				<li><a href="home.php">ABOUT US</a></li>
				<li><a href="home.php">CONTACT US</a></li>
				<li><a href="../admin/logout.php">LOG OUT</a></li>
			</ul>
		</nav>
	</div>

	<div class="container">
		<table class="table">
			<thead class="thead-dark">
				<?php 
				$select_st = $db->prepare("SELECT name AS 'Name',
				eventid, COALESCE(eventName, r.eventAttended) AS 'Event Attended', eventVenue AS 'Venue', gameName AS 'Game', dateStart AS 'Date Start', dateEnd AS 'Date End'
				FROM users u INNER JOIN registered_events r
				ON u.userId = r.userId
				INNER JOIN events rt ON r.eventAttended = rt.eventId
				WHERE u.userId = :id GROUP BY name, r.eventAttended;");
				$select_st->execute([
					':id' => $_SESSION['user']['id']
				]);
				$row = $select_st->fetchAll(PDO::FETCH_ASSOC);
				if (!empty($row)) {
				?>
				<tr>
					<th scope="col">Event Name</th>
					<th scope="col">Event Venue</th>
					<th scope="col">Game Name</th>
					<th scope="col">Date</th>
					<th scope="col">Actions</th>
				</tr>
				<?php } ?>
			</thead>
			<tbody>
				<?php
					if (!empty($row)) {
						foreach($row as $data) {
				?>
				<tr>
					<td> <?php echo $data['Event Attended'];?> </td>
					<td> <?php echo $data['Venue'];?> </td>
					<td> <?php echo $data['Game'];?> </td>
					<td> <?php echo "".$data['Date Start']." until ".$data['Date End'];?> </td>
					<td> <?php echo '<a class="btn btn-success btn-sm" id='.$data["eventid"].'>Leave Event</a>'?>
				</tr>
				<?php }} else {
					echo "<h1> No events! </h1>";
				}?>
			</tbody>
		</table>
	</div>
	</div>
	
	<footer">
		<div class="footer" style="text-align: center;">
			<h1>© 2021 by Team Maki</h1>
        </div>
    </footer>
</body>

</html>