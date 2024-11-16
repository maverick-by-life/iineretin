<div class="contacts">
    <div>
        <div class="contacts__title">
            <h2>Адрес и телефон</h2>
            <span></span>
        </div>
        <div class="contacts__map">
            <script type="text/javascript" charset="utf-8" async
                    src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Aec869dfff81e9004e1a1bc9c7c2f24cb2c3bd5bfdbd92d63632d7fa7f29790a0&amp;width=100%&amp;height=100%&amp;lang=ru_RU&amp;scroll=false">
            </script>
        </div>
        <address>
            <?php the_field('address') ?>
        </address>
        <div>
            <p>Телефон:&nbsp;&nbsp;<?php the_field('phone') ?></p>
            <p>
                Электронная почта:&nbsp;&nbsp;
                <a href="mailto:<?php the_field('email') ?>"><?php the_field('email') ?></a>
            </p>
            <p>
                Сайт:&nbsp;&nbsp;
                <a href="https://<?php the_field('site') ?>" target="_blank"><?php the_field('site') ?></a>
            </p>
        </div>
    </div>
    <div>
        <div class="contacts__title">
            <h2>Форма связи</h2>
            <span></span>
        </div>
        <?php echo do_shortcode('[wpforms id="133" title="false"]') ?>
    </div>
</div>