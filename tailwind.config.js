module.exports = {
  content: ['*.{php,html,js}'],
  theme: {
    extend: {
      animation: {
        'height-enter': 'expand 1s linear',
        'height-exit': 'shrink 1s linear',
      },
      keyframes: {
        expand: {
          '0%': { 'max-height': '0px', opacity: 0 },
          '70%': { 'max-height': '100vh', opacity: 1 },
        },
        shrink: {
          '0%': { 'max-height': '100vh' },
          '70%': { 'max-height': '0px', opacity: 0 },
        },
      },
      fontFamily: {
        PT: ['PT Sans', 'sans-serif'],
        Josefin: ['Josefin Sans', 'sans-serif'],
        Source: ['Source Sans Pro', 'serif'],
      },
      colors: {
        primary: '#424242',
        secondary: '#aaaaaa',
        tertiary: '#111111',
      },
      letterSpacing: {
        tightest: '-.075em',
        tighter: '-.05em',
        tight: '-.025em',
        normal: '0',
        wide: '.025em',
        wider: '.05em',
        widest: '.15em',
      },
    },
  },
  plugins: [],
};
