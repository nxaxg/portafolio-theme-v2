<form action="<?php the_permalink(); ?>" method="post" class="form">
    <div class="form__group">
        <input type="text" class="form-control form__control" name="contacto-nombre" id="contacto-nombre" placeholder="Nombre" required>
    </div>
    <div class="form__group">
        <input type="email" class="form-control form__control" name="contacto-email" id="contacto-email" placeholder="E-mail" required>
    </div>
    <div class="form__group">
        <textarea name="contacto-mensaje" id="contacto-mensaje" class="form-control form__control" placeholder="Mensaje" rows="2"
            required></textarea>
    </div>
    <div class="form__group">
        <input type="hidden" name="st_verify" id="st_verify">
        <input type="submit" class="button form__button" value="Enviar">
        <?php wp_nonce_field('enviar_formulario_contacto', 'st_nonce'); ?>
    </div>
</form>