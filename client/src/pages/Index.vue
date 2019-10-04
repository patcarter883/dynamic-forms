<template>
  <q-page class="flex flex-center">
    <div class="col">
      <vfg-data-table
        :models="models"
        :schema="module.schema"
      />
      <vue-form-generator
        :model="models[0]"
        :schema="module.schema"
      />
    </div>
    <div class="col">
      <module-editor :module="module" />
    </div>
  </q-page>
</template>

<script>
import ModuleEditor from 'components/module/moduleEditor'

export default {
  name: 'PageIndex',
  components: {
    ModuleEditor
  },
  data () {
    return {
      models: [
        {
          id: 1,
          name: 'John Doe',
          password: 'J0hnD03!x4',
          skills: ['Javascript', 'VueJS'],
          email: 'john.doe@gmail.com',
          status: true
        },
        {
          id: 2,
          name: 'John Doe',
          password: 'J0hnD03!x4',
          skills: ['Javascript', 'VueJS'],
          email: 'john.doe@gmail.com',
          status: true
        }
      ],
      model: {
        id: 1,
        name: 'John Doe',
        password: 'J0hnD03!x4',
        skills: ['Javascript', 'VueJS'],
        email: 'john.doe@gmail.com',
        status: true
      },
      module: {
        name: 'Test Module',
        schema: {
          groups: [
            {
              legend: 'User Details',
              fields: [
                {
                  type: 'qInput',
                  inputType: 'text',
                  qlabel: 'ID',
                  model: 'id',
                  readonly: true,
                  disabled: true,
                  tableDisplay: true
                },
                {
                  type: 'qInput',
                  inputType: 'text',
                  qlabel: 'Name',
                  model: 'name',
                  id: 'user_name',
                  placeholder: 'Your name',
                  featured: true,
                  required: true,
                  tableDisplay: true
                },
                {
                  type: 'qInput',
                  inputType: 'email',
                  qlabel: 'E-mail',
                  model: 'email',
                  placeholder: 'User\'s e-mail address',
                  tableDisplay: true
                },
                {
                  type: 'qInput',
                  inputType: 'password',
                  qlabel: 'Password',
                  model: 'password',
                  min: 6,
                  required: true,
                  hint: 'Minimum 6 characters',
                  validator: 'string',
                  tableDisplay: false
                }
              ]
            },
            {
              legend: 'Skills & Status',
              fields: [
                {
                  type: 'qSelect',
                  qlabel: 'Skills',
                  model: 'skills',
                  values: ['Javascript', 'VueJS', 'CSS3', 'HTML5'],
                  tableDisplay: false
                },
                {
                  type: 'qCheckbox',
                  qlabel: 'Status',
                  model: 'status',
                  default: true,
                  tableDisplay: false
                }
              ]
            }
          ]
        }
      },
      formOptions: {
        validateAfterLoad: true,
        validateAfterChanged: true,
        validateAsync: true
      }
    }
  }
}
</script>
