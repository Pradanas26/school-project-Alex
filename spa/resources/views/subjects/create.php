<?php
$layout      = 'app';
$pageTitle   = 'Nova assignatura';
$breadcrumbs = [
    ['label' => 'Dashboard', 'url' => '/'],
    ['label' => 'Assignatures', 'url' => '/subjects'],
    ['label' => 'Nova assignatura'],
];

ob_start();
?>

<div class="page-header">
    <div>
        <div class="page-title">📚 Nova assignatura</div>
        <div class="page-subtitle">Registra una nova assignatura al sistema</div>
    </div>
    <a href="/subjects" class="btn btn-secondary">← Tornar</a>
</div>

<div class="card" style="max-width:560px">
    <div class="card-header">
        <span class="card-title">Dades de l'assignatura</span>
    </div>
    <div class="card-body">

        <?php if (!empty($errors['api'])): ?>
        <div class="alert alert-error">
            <span class="alert-icon">❌</span><?= e($errors['api']) ?>
        </div>
        <?php endif; ?>

        <form action="/subjects" method="POST">

            <div class="form-group">
                <label class="form-label" for="name">
                    Nom de l'assignatura <span class="required">*</span>
                </label>
                <input
                    type="text" id="name" name="name"
                    class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>"
                    value="<?= e($old['name'] ?? '') ?>"
                    placeholder="p.ex. Programació, Bases de Dades, Anglès…"
                    required
                >
                <?php if (isset($errors['name'])): ?>
                    <div class="form-error">⚠ <?= e($errors['name']) ?></div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label class="form-label" for="courseId">
                    ID del Curs <span class="required">*</span>
                </label>
                <input
                    type="text" id="courseId" name="courseId"
                    class="form-control <?= isset($errors['courseId']) ? 'is-invalid' : '' ?>"
                    value="<?= e($old['courseId'] ?? '') ?>"
                    placeholder="UUID del curs al qual pertany aquesta assignatura"
                    required
                >
                <?php if (isset($errors['courseId'])): ?>
                    <div class="form-error">⚠ <?= e($errors['courseId']) ?></div>
                <?php endif; ?>
                <div class="form-hint">
                    Introdueix l'identificador UUID del curs (es pot obtenir de l'API: <code>GET /api/courses</code>).
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">✅ Crear assignatura</button>
                <a href="/subjects" class="btn btn-secondary">Cancel·lar</a>
            </div>

        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require SPA_PATH . '/resources/views/layouts/app.php';
