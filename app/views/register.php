<?php $title = 'Register'; ?>

<?php ob_start(); ?>
<div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
    <div class="md:flex">
        <div class="p-8">
            <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Register</div>
            <?php if (isset($error)): ?>
                <div class="mt-4 p-2 bg-red-100 text-red-700 rounded">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            <form class="mt-6" action="/register" method="POST">
                <div>
                    <label class="block text-gray-700">First Name</label>
                    <input type="text" name="first_name" placeholder="Enter your first name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                </div>
                <div class="mt-4">
                    <label class="block text-gray-700">Last Name</label>
                    <input type="text" name="last_name" placeholder="Enter your last name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                </div>
                <div class="mt-4">
                    <label class="block text-gray-700">Email</label>
                    <input type="email" name="email" placeholder="Enter your email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                </div>
                <div class="mt-4">
                    <label class="block text-gray-700">Password</label>
                    <input type="password" name="password" placeholder="Enter your password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                </div>
                <div class="mt-4">
                    <label class="block text-gray-700">Role</label>
                    <select name="role" id="role" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        <option value="patient">Patient</option>
                        <option value="medecin">Médecin</option>
                    </select>
                </div>
                <div id="patient-fields" class="mt-4">
                    <div>
                        <label class="block text-gray-700">Date of Birth</label>
                        <input type="date" name="date_naissance" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    <div class="mt-4">
                        <label class="block text-gray-700">Phone</label>
                        <input type="tel" name="telephone" placeholder="Enter your phone number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                </div>
                <div id="medecin-fields" class="mt-4 hidden">
                    <label class="block text-gray-700">Speciality</label>
                    <input type="text" name="specialite" placeholder="Enter your speciality" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="mt-6">
                    <button type="submit" class="py-2 px-4 bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('role').addEventListener('change', function() {
    const patientFields = document.getElementById('patient-fields');
    const medecinFields = document.getElementById('medecin-fields');
    if (this.value === 'patient') {
        patientFields.classList.remove('hidden');
        medecinFields.classList.add('hidden');
    } else {
        patientFields.classList.add('hidden');
        medecinFields.classList.remove('hidden');
    }
});
</script>

<?php $content = ob_get_clean(); ?>

<?php include 'layout.php'; ?>

