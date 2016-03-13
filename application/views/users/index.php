<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $userInfo['alias'] ?></title>
<?php $this->load->view('partials/header.php')	?>
<?php $this->load->view('partials/navigation.php')	?>

	<div class="container">
		<h2><?= $userInfo['alias'] ?>'s Profile</h2>
		<h3>Name: <?= $userInfo['name'] ?></h3>
		<h3>Email: <?= $userInfo['email'] ?></h3>
	</div>

</body>
</html>
