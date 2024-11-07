<div x-data="{
        rows: {{ json_encode($rows) }},
        addRow() {
            this.rows.push({ alpineInput: '', input: '' });
        },
        removeRow(key) {
            this.rows.splice(key, 1);
        },
    }"

     class="p-4 bg-white rounded-lg shadow-md">
    <table class="w-full border border-gray-200 divide-y divide-gray-200 rounded-lg overflow-hidden">
        <thead class="bg-gray-50">
        <tr>
            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">№</th>
            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Alpine Component Input</th>
            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Input</th>
            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
        </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
        <template x-for="(row, key) in rows" :key="key">
            <tr>
                <td class="px-6 py-4 text-sm text-gray-700" x-text="key + 1" wire:model.live="rows"></td>
                <td class="px-6 py-4">
                    <input type="text" x-model="row.alpineInput" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400">
                </td>
                <td class="px-6 py-4">
                    <input type="text" x-model="row.input" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400">
                </td>
                <td class="px-6 py-4 text-right">
                    <button @click="removeRow(key)" class="px-3 py-2 text-sm font-medium text-white bg-red-500 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:bg-red-600">
                        Удалить
                    </button>
                </td>
            </tr>
        </template>
        </tbody>
    </table>
    <div class="flex justify-end gap-4 mt-4">
        <button @click="addRow()" class="px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:bg-blue-600">
            Добавить строку
        </button>
        <button @click="$wire.$refresh()" class="px-4 py-2 text-sm font-medium text-white bg-green-500 rounded hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400 focus:bg-green-600">
            Сохранить
        </button>
    </div>
</div>

