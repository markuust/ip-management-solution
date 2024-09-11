<template>
    <div v-if="isOpen" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-lg p-6">
        <h2 class="text-2xl font-bold mb-4">Edit IP Address Record</h2>
        
        <form @submit.prevent="submit">
            <div class="mb-4">
            <label for="ip_address" class="block text-sm font-medium text-gray-700">IP Address</label>
            <input v-model="form.ip_address" type="text" id="ip_address"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
            <label for="notes" class="block text-sm font-medium text-gray-700">Notes</label>
            <textarea v-model="form.notes" id="notes"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"></textarea>
            </div>
            <div class="flex justify-end space-x-3">
            <button type="button" @click="closeModal" class="px-4 py-2 bg-gray-500 text-white rounded-lg">Cancel</button>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Update</button>
            </div>
        </form>
        </div>
    </div>
</template>
  
<script>
import { useForm } from '@inertiajs/vue3';

export default {
    props: {
        ipAddress: Object,
        isOpen: Boolean, // Prop to control the visibility of the modal
    },
    setup(props, { emit }) {
        const form = useForm({
            ip_address: props.ipAddress.ip_address,
            notes: props.ipAddress.notes,
        });

        const submit = () => {
            form.put(`/ip-management/${props.ipAddress.id}`, {
                onSuccess: (response) => {
                    console.log(response);
                    // Emit 'update' event with the updated IP address to the parent
                    emit('update', response.props.NewIpAddress);  
                    closeModal();
                },
            });
        };

        const closeModal = () => {
            emit('close'); // Emit an event to parent to close the modal
        };

        return { form, submit, closeModal };
    },
};
</script>

<style scoped>
</style>
  