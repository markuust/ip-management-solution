<template>
  <div class="container mx-auto mt-10">
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-3xl font-bold">IP Address Records</h1>
      <button @click="openCreateModal" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Create New IP</button>
    </div>
    
    <div class="overflow-x-auto">
      <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
        <thead class="bg-gray-200">
          <tr>
            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">IP Address</th>
            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Notes</th>
            <th class="px-4 py-2 text-right text-sm font-medium text-gray-600">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="ip in ipAddresses" :key="ip.id" class="border-b hover:bg-gray-50">
            <td class="px-4 py-2 text-gray-700">{{ ip.ip_address }}</td>
            <td class="px-4 py-2 text-gray-700">{{ ip.notes }}</td>
            <td class="px-4 py-2 text-right">
              <button @click="openEditModal(ip)" class="bg-green-600 text-white px-3 py-1 rounded-lg">Edit</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Create Modal -->
    <CreateModal v-if="isCreateModalOpen" :isOpen="isCreateModalOpen" @close="closeCreateModal" @create="addIpAddress" />

    <!-- Edit Modal -->
    <EditModal v-if="isEditModalOpen" :isOpen="isEditModalOpen" :ipAddress="selectedIpAddress" @close="closeEditModal" @update="updateIpAddress" />
  </div>
</template>

<script>
import { ref } from 'vue';
import CreateModal from './CreateModal.vue';
import EditModal from './EditModal.vue';

export default {
  components: {
    CreateModal,
    EditModal,
  },
  props: {
    ipAddresses: Array,
  },
  setup(props, { emit }) {
    const isCreateModalOpen = ref(false);
    const isEditModalOpen = ref(false);
    const selectedIpAddress = ref(null);
    const ipAddresses = ref(props.ipAddresses);

    const openCreateModal = () => {
      isCreateModalOpen.value = true;
    };

    const closeCreateModal = () => {
      isCreateModalOpen.value = false;
    };

    const openEditModal = (ip) => {
      selectedIpAddress.value = ip;
      isEditModalOpen.value = true;
    };

    const closeEditModal = () => {
      isEditModalOpen.value = false;
    };
    
    const addIpAddress = (newIp) => {
      ipAddresses.value.push(newIp);
      closeCreateModal();
    };

    const updateIpAddress = (updatedIp) => {
      const index = ipAddresses.value.findIndex(ip => ip.id === updatedIp.id);
      if (index !== -1) {
        ipAddresses.value[index] = updatedIp;
      }
      closeEditModal();
    };

    return {
      ipAddresses,
      isCreateModalOpen,
      isEditModalOpen,
      selectedIpAddress,
      openCreateModal,
      closeCreateModal,
      openEditModal,
      closeEditModal,
      addIpAddress,
      updateIpAddress,
    };
  },
};
</script>
