<?php
if (!is_404()) { ?>
	<footer></footer>
	<div class="privacy-popup">
		<p>При работе с сайтом Вы даете согласие на обработку персональных данных, использование хранилища...</p>
		<div class="privacy-popup__btns">
			<a class="btn" href="<?php the_permalink(3) ?>">Прочитать все</a>
			<button class="agree btn" type="button">Согласиться</button>
		</div>
	</div>
<?php	} ?>
<?php wp_footer(); ?>
</body>

</html>