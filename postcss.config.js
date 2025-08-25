import tailwindcss from 'tailwindcss'
import autoprefixer from 'autoprefixer'
import purgecss from '@fullhuman/postcss-purgecss'

export default {
  plugins: [
    tailwindcss(),
    autoprefixer(),
    purgecss.default({
      content: [
        './resources/views/**/*.php',
        './resources/js/**/*.js'
      ],
      safelist: ['active', /^btn-/, /^nav-/],
    })
  ]
}
