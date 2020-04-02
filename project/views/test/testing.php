<form action="/result" method="POST">
    <?php foreach ($questions as $question):?>
        <p><b><?php echo $question['id'] . '.' . $question['text']?></b></p>
        <p><input name="<?php echo $question['id']?>" type="radio" value="a">a</p>
        <p><input name="<?php echo $question['id']?>" type="radio" value="b">b</p>
        <p><input name="<?php echo $question['id']?>" type="radio" value="c">c</p>
        <p><input name="<?php echo $question['id']?>" type="radio" value="d" checked>d</p>
    <?php endforeach; ?>
    <p><input type="submit" class="button_active" value="Проверить результат">
</form>

