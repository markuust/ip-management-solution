<template>
    <div>
      <h1>IP Address</h1>
      <Link href="/ip-management/create" class="btn">Add New IP Address</Link>
  
      <table>
        <thead>
          <tr>
            <th>IP Address</th>
            <th>Label</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="ipAddress in ipAddresses" :key="ipAddress.id">
            <td>{{ ipAddress.ip_address }}</td>
            <td>{{ ipAddress.notes }}</td>
            <td align="center">
              <Link :href="`/ip-management/${ipAddress.id}/edit`" class="btn">Edit</Link>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  
  <script>
  import { Link, useForm } from '@inertiajs/vue3';
  
  export default {
    props: {
      ipAddresses: Array,
    },
    setup() {
      const deletePost = (id) => {
        useForm().delete(`/ip-management/${id}`);
      };
  
      return { deletePost };
    },
  };
  </script>
  