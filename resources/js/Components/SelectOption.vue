<template>
  <div>
    <label :for="id" class="block text-sm font-medium text-gray-700">
      {{ label }}
    </label>
    <select
      :id="id"
      :name="id"
      :class="`mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200`"
      :value="modelValue" 
      @change="updateValue($event.target.value)"
      required
    >
      <option value="" disabled>Select an option</option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
      <option value="Other">Other</option>
    </select>
    <p v-if="error" class="mt-2 text-sm text-red-500">{{ error }}</p>
  </div>
</template>

<script setup>
const props = defineProps({
  id: String,
  label: String,
  modelValue: String,  // Updated to match the type of value being used
  error: String,
});

const emit = defineEmits(['update:modelValue']);

const updateValue = (value) => {
  emit('update:modelValue', value);
};
</script>

<style scoped>
/* Add styles if needed */
</style>
