module.exports = {
  theme: {
    extend: {}
  },
  variants: {
      borderColor: ['responsive', 'hover', 'focus', 'group-hover'],
  },
  plugins: [
    require('@tailwindcss/custom-forms')
  ]
}
