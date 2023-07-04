module.exports = {
  env: {
    browser: true,
    es2021: true,
  },
  parser: '@typescript-eslint/parser',
  plugins: ['@typescript-eslint', 'import'],
  extends: ['eslint:recommended', 'plugin:react/recommended', 'plugin:@typescript-eslint/recommended', 'airbnb-base'],
  rules: {
    'no-console': 'warn',
    'no-unused-vars': 'off',
    'no-alert': 'warn',
    'linebreak-style': 'off',
    'no-underscore-dangle': 'off',
    'dot-notation': 'off',
    'max-len': [
      'warn',
      {
        code: 150,
        ignoreComments: true,
      },
    ],
    '@typescript-eslint/no-explicit-any': 'off',
    '@typescript-eslint/no-unused-vars': ['warn'],
    '@typescript-eslint/indent': ['warn', 2],
    'object-curly-newline': 0,
    'no-use-before-define': [
      'error',
      {
        functions: true,
        classes: true,
        variables: false,
        allowNamedExports: true,
      },
    ],
    'import/no-unresolved': 'off',
    'react/react-in-jsx-scope': 'off',
    'import/extensions': [
      'error',
      'ignorePackages',
      {
        js: 'never',
        jsx: 'never',
        ts: 'never',
        tsx: 'never',
      },
    ],
    'import/order': [
      'warn',
      {
        groups: ['builtin', 'external', ['parent', 'sibling'], 'index', 'object', 'type'],
        alphabetize: {
          order: 'asc',
          caseInsensitive: true,
        },
        'newlines-between': 'always',
      },
    ],
  },
  settings: {
    'import/parsers': {
      '@typescript-eslint/parser': ['.ts', '.tsx'],
    },
    'import/resolver': {
      typescript: {},
      node: {
        paths: ['src'],
      },
    },
    'import/no-extraneous-dependencies': [
      'error',
      {
        projectDependencies: false,
      },
    ],
  },
};
