<template>
<div>
    <h2 v-if="currentStep === 1">Step 1: Product Details</h2>
    <h2 v-if="currentStep === 2">Step 2: Upload Images</h2>
    <h2 v-if="currentStep === 3">Step 3: Choose Date and Time</h2>
    
    <form @submit.prevent="handleSubmit">
      <div v-show="currentStep === 1">
          <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" name="name" id="name" v-model="newProduct.name" class="form-control" required>
            <span v-if="errors.name" class="error">{{ errors.name }}</span>
          </div>
          <div class="form-group">
            <label for="category">Category</label>
            <select name="category" id="category" v-model="newProduct.category" class="form-control" required>
              <option value="Electronics">Electronics</option>
              <option value="Clothing and Apparel">Clothing and Apparel</option>
              <option value="Home and Kitchen">Home and Kitchen</option>
              <option value="Health and Wellness">Health and Wellness</option>
              <option value="Beauty and Personal Care">Beauty and Personal Care</option>
              <option value="Automotive">Automotive</option>
              <option value="Sports and Outdoors">Sports and Outdoors</option>
              <option value="Toys and Games">Toys and Games</option>
              <option value="Food and Beverages">Food and Beverages</option>
              <option value="Books and Media">Books and Media</option>
            </select>
            <span v-if="errors.category" class="error">{{ errors.category }}</span>
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" v-model="newProduct.description" class="form-control"></textarea>
            <span v-if="errors.description" class="error">{{ errors.description }}</span>
          </div>
      </div>

      <div v-show="currentStep === 2">  
          <div class="form-group">
            <label for="images">Images</label>
            <input type="file" name="images" id="images" ref="imageInput" multiple class="form-control-file" accept="image/*" required>
            <span v-if="errors.images" class="error">{{ errors.images }}</span>
          </div>
      </div>

      <div v-show="currentStep === 3">
          <div class="form-group">
            <label for="date_and_time">Date and Time</label>
            <input name="date_and_time" type="datetime-local" id="date_and_time" v-model="newProduct.date_and_time" class="form-control" step="1">
            <span v-if="errors.date_and_time" class="error">{{ errors.date_and_time }}</span>
          </div>
      </div>

      <button type="button" class="btn btn-secondary" style="margin-right: 5px;" @click="prevStep" :disabled="currentStep === 1">Previous</button>
      <button type="button" class="btn btn-primary" style="margin-right: 5px;" @click="nextStep" v-if="currentStep < 3">Next</button>
      <button type="submit" class="btn btn-success" v-if="currentStep === 3">Submit</button>
    </form>
  </div>
</template>


<script>
export default 
{  
  data() 
  {
    return {
      currentStep: 1,
      newProduct: {
        name: '',
        category: '',
        description: '',
        date_and_time: '',
      },
      errors: {
        name: '',
        category: '',
        description: '',
        images: '',
        date_and_time: '',
      },
    };
  },
  methods: 
  {
    nextStep() 
    {
      if (this.currentStep === 1) 
      {
        if (this.validateStep1()) 
        {
          this.step1Valid = true;
          this.currentStep++;
        }
      } 
      else if (this.currentStep === 2) 
      {
        if (this.validateStep2()) 
        {
          this.step2Valid = true;
          this.currentStep++;
        }
      } 
      else 
      {
        this.currentStep++;
      }
    },
    prevStep() 
    {
      this.currentStep--;
    },
    validateStep1() {
      let valid = true;
      if (!this.newProduct.name) 
      {
        this.errors.name = 'Name is required.';
        valid = false;
      } 
      else 
      {
        this.errors.name = '';
      }
      if (!this.newProduct.category) 
      {
        this.errors.category = 'Category is required.';
        valid = false;
      } 
      else 
      {
        this.errors.category = '';
      }
      if (!this.newProduct.description) 
      {
        this.errors.description = 'Description is required.';
        valid = false;
      } 
      else 
      {
        this.errors.description = '';
      }
      return valid;
    },
    validateStep2() 
    {
      let valid = true;
      if (this.$refs.imageInput.files.length === 0) 
      {
        this.errors.images = 'Please select at least one image.';
        valid = false;
      } 
      else 
      {
        this.errors.images = '';
      }
      return valid;
    },
    validateStep3() {
      let valid = true;
      if (!this.newProduct.date_and_time) 
      {
        this.errors.date_and_time = 'Please select a date and time.';
        valid = false;
      } 
      else 
      {
        this.errors.date_and_time = '';
      }
      return valid;
    },
    async handleSubmit() {
      if (this.currentStep === 1) {
        if (!this.validateStep1()) {
          return;
        }
      } else if (this.currentStep === 2) {
        if (!this.validateStep2()) {
          return;
        }
      } else if (this.currentStep === 3) {
        if (!this.validateStep3()) {
          return;
        }
      }

      try {
        const response = await axios.post('/api/store', this.newProduct);
        if (response.status === 201) {
          console.log('Product submitted successfully');
          window.location.href = '/api/products';
        }
      } catch (error) {
          console.error('Error submitting product:', error.response.data);
      }
    }

  }
}
</script>

<style>
.error {
  color: red;
  font-size: 12px;
}
</style>
