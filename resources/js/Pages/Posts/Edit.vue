<template>
    <div>
      <h1>Edit IP Address Record</h1>
      <form @submit.prevent="submit">
        <div>
          <label for="ip_address">IP Address</label>
          <input v-model="form.ip_address" type="text" id="ip_address">
        </div>
        <div>
          <label for="notes">Notes</label>
          <textarea v-model="form.notes" id="notes"></textarea>
        </div>
        <button type="submit">Update</button>
      </form>
    </div>
  </template>
  
  <script>
  import { useForm } from '@inertiajs/vue3';
  
  export default {
    props: {
      ipAddress: Object,
    },
    setup(props) {
      const form = useForm({
        ip_address: props.ipAddress.ip_address,
        notes: props.ipAddress.notes,
      });
  
      const submit = () => {
        form.put(`/ip-management/${props.ipAddress.id}`);
      };
  
      return { form, submit };
    },
  };
  </script>
  