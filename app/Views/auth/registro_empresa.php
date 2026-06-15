<?php $pageTitle = 'Cadastro da Empresa'; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head><?php require APP_PATH . '/Views/layouts/head.php'; ?></head>
<body>
<main class="register-page">
    <div class="register-header">
        <img src="<?= icon('logo_chapeu_academico.svg') ?>" alt="">
        <a href="<?= url('/') ?>" class="back-link"><img src="<?= icon('seta_voltar.svg') ?>" alt=""> Voltar</a>
    </div>

    <section class="register-layout">
        <form class="form-card" method="POST">
            <h2>Cadastro da Empresa</h2>

            <?php if ($erro): ?>
                <p class="alert-error"><?= e($erro) ?></p>
            <?php endif; ?>

            <label>Nome da empresa</label>
            <input type="text" name="nome" value="<?= e($post['nome'] ?? '') ?>" required>

            <label>E-mail</label>
            <input type="email" name="email" value="<?= e($post['email'] ?? '') ?>" required>

            <label>CNPJ</label>
            <input type="text" name="cnpj" placeholder="00.000.000/0000-00" value="<?= e($post['cnpj'] ?? '') ?>" required data-mask="cnpj">

            <label>Telefone</label>
            <input type="text" name="telefone" placeholder="(44) 99999-9999" value="<?= e($post['telefone'] ?? '') ?>" required data-mask="phone">

            <label>Senha</label>
            <div class="password-field-fixed">
                <input id="emp-senha" type="password" name="senha" placeholder="Criar senha" required autocomplete="new-password">
                <button type="button" class="password-toggle" id="btnEmpSenha" aria-label="Mostrar senha">
                    <img src="<?= icon('olho_senha.svg') ?>" alt="">
                </button>
            </div>

            <label>Confirmar Senha</label>
            <div class="password-field-fixed">
                <input id="emp-confirmar-senha" type="password" name="confirmar_senha" placeholder="Confirme sua senha" required autocomplete="new-password">
                <button type="button" class="password-toggle" id="btnEmpConfirmar" aria-label="Mostrar confirmação de senha">
                    <img src="<?= icon('olho_senha.svg') ?>" alt="">
                </button>
            </div>

            <button type="submit" class="btn-primary full">Salvar e continuar</button>
        </form>

        <div class="register-text">
            <h1>Encontre novos<br>talentos.</h1>
            <p>Cadastre sua empresa, publique vagas e acompanhe candidatos.</p>
            <img src="<?= icon('portal_empresa_predio.svg') ?>" alt="">
        </div>
    </section>
</main>
<script src="<?= asset('js/mascaras.js') ?>"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    function toggleSenha(inputId, btnId, labelMostrar, labelOcultar) {
        const input = document.getElementById(inputId);
        const btn   = document.getElementById(btnId);
        if (!input || !btn) return;
        btn.addEventListener('click', function () {
            const mostrando = input.type === 'text';
            input.type = mostrando ? 'password' : 'text';
            btn.setAttribute('aria-label', mostrando ? labelMostrar : labelOcultar);
            btn.classList.toggle('active', !mostrando);
        });
    }

    toggleSenha('emp-senha',          'btnEmpSenha',    'Mostrar senha',               'Ocultar senha');
    toggleSenha('emp-confirmar-senha', 'btnEmpConfirmar','Mostrar confirmação de senha','Ocultar confirmação de senha');
});
</script>
</body>
</html>
