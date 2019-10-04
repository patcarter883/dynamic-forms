import VueFormGenerator from 'vue-form-generator'
// import 'vue-form-generator/dist/vfg.css'

const requireComponents = require.context(
  // The relative path holding the service modules
  'components/vfg',
  // Whether to look in subfolders
  false,
  // Only include .js files (prevents duplicate imports)
  /.vue$/
)
const components = requireComponents
  .keys()
  .map(modulePath => requireComponents(modulePath).default)

// "async" is optional
export default async ({ Vue }) => {
  components.forEach(component => {
    Vue.component(component.name, component)
  })
  Vue.use(VueFormGenerator)
}
