<?php $title = 'Medecin Dashboard'; ?>

<?php ob_start(); ?>
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Welcome to your Medecin Dashboard</h1>
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <h2 class="text-xl font-semibold mb-4">Your Upcoming Appointments</h2>
        <?php if (empty($rendezVous)): ?>
            <p>You have no upcoming appointments.</p>
        <?php else: ?>
            <ul>
                <?php foreach ($rendezVous as $rv): ?>
                    <li class="mb-2">
                        <span class="font-semibold"><?php echo date('F j, Y, g:i a', strtotime($rv['date_heure'])); ?></span>
                        with <?php echo $rv['first_name'] . ' ' . $rv['last_name']; ?>
                        - Status: <?php echo ucfirst($rv['statut']); ?>
                        <?php if ($rv['statut'] === 'en attente'): ?>
                            <a href="/rendez-vous/confirm/<?php echo $rv['id']; ?>" class="text-green-500 hover:text-green-700 ml-2">Confirm</a>
                            <a href="/rendez-vous/cancel/<?php echo $rv['id']; ?>" class="text-red-500 hover:text-red-700 ml-2">Cancel</a>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php include 'app/views/layout.php'; ?>

