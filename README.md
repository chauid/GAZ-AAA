# GAZ-AAA Project

## Frontend : [React](https://react.dev/) + [TypeScript](https://www.typescriptlang.org/) + [Vite](https://ko.vitejs.dev/)

This template provides a minimal setup to get React working in Vite with HMR and some ESLint rules.

Currently, two official plugins are available:

- [@vitejs/plugin-react](https://github.com/vitejs/vite-plugin-react/blob/main/packages/plugin-react/README.md) uses [Babel](https://babeljs.io/) for Fast Refresh
- [@vitejs/plugin-react-swc](https://github.com/vitejs/vite-plugin-react-swc) uses [SWC](https://swc.rs/) for Fast Refresh

## #Expanding the ESLint configuration

If you are developing a production application, we recommend updating the configuration to enable type aware lint rules:

- Configure the top-level `parserOptions` property like this:

```js
   parserOptions: {
    ecmaVersion: 'latest',
    sourceType: 'module',
    project: ['./tsconfig.json', './tsconfig.node.json'],
    tsconfigRootDir: __dirname,
   },
```

- Replace `plugin:@typescript-eslint/recommended` to `plugin:@typescript-eslint/recommended-type-checked` or `plugin:@typescript-eslint/strict-type-checked`
- Optionally add `plugin:@typescript-eslint/stylistic-type-checked`
- Install [eslint-plugin-react](https://github.com/jsx-eslint/eslint-plugin-react) and add `plugin:react/recommended` & `plugin:react/jsx-runtime` to the `extends` list

<br />

## Backend : [Laravel](https://laravel.com/)

### Version Info

> Laravel Framework 10.16.1  
> Node 20.5.0

웹 서버 프로그래밍 과제로 제출한 서버입니다.  
서버 주소 : [**http://34.168.223.254**](http://34.168.223.254)

## Not Support SSL!! + No Domain Name.

도메인 사기 아까워서 SSL도 지원 안 합니다. 이 웹사이트에서 접속하고 개인 정보를 입력하는 것을 지양합니다.  
**해당 웹 사이트에서 개인정보를 비롯한 어떠한 보안 관련 피해에 대하여 보상해주지 않습니다.**

## 무료 서버

가격은 낮추고 성능은 _**Down!**_  
해당 웹 사이트는 GCP(Google Cloud Platform)의 무료 서버를 사용하였습니다. 유료서버는 비용이 많이 들기 때문에 서버의 성능을 낮췄습니다._**(매우 합리적!)**_  
**본 개발자는 웹 사이트가 급격히 느려지는 현상, 렉을 동반한 서버의 오류로 인해 발생한 정신적인 피해에 대하여 일체 보상하지 않음을 약속합니다.**

## 코인 시세 결정 알고리즘 공개!

그래프? 사실 그런 거 의미 없습니다. 코인 관련 뉴스 기사 뜨면 투자하세요.  
시세를 결정하는 로직은 **전부 랜덤입니다.** 약간의 로직이 있긴 합니다.  
[시세 알고리즘 보기](https://github.com/chauid/GAZ-AAA_CoinPrice)

## License

This project is licensed under the [MIT License](LICENSE).

---

## Debug Project

프로젝트에서 백엔드와 프론트엔드가 각각 독립적으로 구동하는 모노리스 방식으로 로컬 서버에서 디버깅을 하기 위한 과정을 다음과 같습니다.

### laravel debug

```
composer install
or
php composer.phar install

php artisan serve
```

### React debug

```
cd gaz-aaa-front
yarn
or
yarn install

yarn dev
```
