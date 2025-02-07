<?php $title = 'Patient Dashboard'; ?>

<?php ob_start(); ?>
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Welcome to your Patient Dashboard</h1>
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <h2 class="text-xl font-semibold mb-4">Your Upcoming Appointments</h2>
        <?php if (empty($rendezVous)): ?>
            <p>You have no upcoming appointments.</p>
        <?php else: ?>
            <ul>
                <?php foreach ($rendezVous as $rv): ?>
                    <li class="mb-2">
                        <span class="font-semibold"><?php echo date('F j, Y, g:i a', strtotime($rv['date_heure'])); ?></span>
                        with Dr. <?php echo $rv['first_name'] . ' ' . $rv['last_name']; ?> (<?php echo $rv['specialite']; ?>)
                        - Status: <?php echo ucfirst($rv['statut']); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <div class="mt-4">
            <a href="/rendez-vous/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Book New Appointment
            </a>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php include 'app/views/layout.php'; ?>

