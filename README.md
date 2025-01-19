## Módulo 5 - Mergulhando no core

### **Service Container:**

 É uma ferramenta para gerenciar injeção de dependencia. O container guarda em memória uma instância de um objeto e de todas as suas dependencias. Caso esse mesmo objeto seja requerido em algum outro momento, a instância guardada no container sera entregue. Evitando que seja necessário instanciar novos objetos iguais.

### **Injeção de Dependencia:**

É o conceito de diminuir o acoplamento das classes ao enviar para uma classe as dependencias que ela nessecita para executar. 

### **Service Provider:**

Junto com o service container, permite que ao instanciar chamar uma classe outra seja instanciada no lugar. Utilizamos este recurso quando precisamos chamar uma interface, mas queremos que no lugar seja instanciado uma classe concreta.

### **Service Container Larave:**

O laravel cria um *service container* ****de maneira automatica no momento do boot da aplicação. Podemos utilizar o container através do *helper app().* Para trabalhar com *service provider* na classe *app/Providers/AppServiceProvider.php* no método *register()* podemos criar um binding de classe abstrata/interface para uma classe concreta através do metodo *$this->app->bind()* ou podemos fazer um contextual binding útilizando o encadeamento de  métodos

*$this->app->when()->needs()->give().* No contextual binding, podemos associar várias classes, que serão instanciadas de acordo com o contexto que foi chamado.

### Facades no laravel:

No laravel as facades funcionan como um “proxi estatico” para chamada de funções. O que o laravel faz é criar uma classe “fake” que consegue buscar no *service container* a classe real e executar um método desta classe. Para criar uma facade no laravel basta extender da classe *Facade*  e implementar o método *getFacadeAccessor().* Também é possível criar uma facade apenas adicionando a palavra *Facades* no use de uma classe importada.