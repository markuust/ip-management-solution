<template>
    <div>
      <h1>Create IP Address record</h1>
      <form @submit.prevent="submit">
        <div>
          <label for="title">IP Address</label>
          <input v-model="form.ip_address" type="text" id="title">
        </div>
        <div>
          <label for="content">Notes</label>
          <textarea v-model="form.notes" id="content"></textarea>
        </div>
        <button type="submit">Create</button>
      </form>
    </div>
  </template>
  
  <script>
  import { useForm } from '@inertiajs/vue3';
  
  export default {
    setup() {
      const form = useForm({
        ip_address: '',
        notes: '',
      });
  
      const submit = () => {
        form.post('/ip-management');
      };
  
      return { form, submit };
    },
  };
  </script>
  