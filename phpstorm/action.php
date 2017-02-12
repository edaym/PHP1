Здравствуйте, <?php echo htmlspecialchars($_POST['name']); ?>.
Вам <?php echo (int)$_POST['age']; ?>
лет, вы преимущественно <?php echo htmlspecialchars($_POST['temp']); ?> и любите
<?php echo htmlspecialchars($_POST['music']); ?>