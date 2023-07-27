module.exports = {
  // content: [
  //   "./resources/**/*.blade.php",
  //   "./resources/**/*.js",
  //   "./resources/**/*.vue"
  // ],
  mode: 'jit',
  purge: [
    "./storage/framework/views/*.php",
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./app/Http/**/*.php"
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require("tailwindcss-animate"),
    require("daisyui"),
  ],
  corePlugins: {
    preflight: false,
  }
}
