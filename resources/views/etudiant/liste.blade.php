<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion des étudiants</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-4xl font-extrabold text-gray-800">Liste des Étudiants</h1>
            <a href="/ajouter" class="px-6 py-3 bg-blue-600 text-white text-lg font-medium rounded-lg shadow-md hover:bg-blue-700 transition duration-300">Ajouter un Étudiant</a>
        </div>
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="min-w-full table-auto border-collapse">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">#</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Prénom</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Filière</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($etudiants as $key => $etudiant)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $key + 1 }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $etudiant->nom }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $etudiant->prenom }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $etudiant->filiere }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex space-x-4">
                                <a href="{{ route('modifier_etudiant', $etudiant->id) }}" class="px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded-md hover:bg-blue-600 transition duration-300">Modifier</a>
                                <button onclick="openModal({{ $etudiant->id }})" class="px-4 py-2 bg-red-500 text-white text-sm font-medium rounded-md hover:bg-red-600 transition duration-300">Supprimer</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div id="deleteModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Confirmer la suppression</h2>
            <p class="text-gray-600 mb-6">Êtes-vous sûr de vouloir supprimer cet étudiant ?</p>
            <form id="deleteForm" method="POST">
                @csrf
                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition duration-300">Annuler</button>
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition duration-300">Supprimer</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal(studentId) {
            const modal = document.getElementById('deleteModal');
            const form = document.getElementById('deleteForm');
            form.action = `/supprimer/${studentId}`;
            modal.classList.remove('hidden');
        }

        function closeModal() {
            const modal = document.getElementById('deleteModal');
            modal.classList.add('hidden');
        }
    </script>
</body>

</html>
