<?php $title = 'Create Rendez-vous'; ?>

<?php ob_start(); ?>
<div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
    <div class="md:flex">
        <div class="p-8">
            <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Create Rendez-vous</div>
            <form class="mt-6" action="/rendez-vous/create" method="POST">
                <div>
                    <label class="block text-gray-700">Médecin</label>
                    <select name="medecin_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        <?php foreach ($medecins as $medecin): ?>
                            <option value="<?php echo $medecin['id']; ?>">
                                Dr. <?php echo $medecin['last_name'] . ' ' . $medecin['first_name'] . ' (' . $medecin['specialite'] . ')'; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mt-4">
                    <label class="block text-gray-700">Date et Heure</label>
                    <input type="datetime-local" name="date_heure" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                </div>
                <div class="mt-6">
                    <button type="submit" class="py-2 px-4 bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">Create Rendez-vous</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php include 'layout.php'; ?>

