<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::create([
            'title' => 'Manutenção de Sistemas',
            'description' => 'Desenvolvimento Web',
            'status' => '1',
        ]);

        Task::create([
            'title' => 'Desenvolvimento de Algoritmos',
            'description' => 'Criar soluções lógicas e eficientes para resolver problemas específicos, muitas vezes implementadas em código.',
            'status' => '1',
        ]);

        Task::create([
            'title' => 'Escrita de Código',
            'description' => 'Programar em linguagens como Python, Java, JavaScript, C++, entre outras, para construir funcionalidades e aplicações.',
            'status' => '1',
        ]);

        Task::create([
            'title' => 'Refatoração de Código',
            'description' => 'Melhorar o código existente sem alterar seu comportamento, buscando tornar o código mais eficiente, legível e de fácil manutenção.',
            'status' => '1',
        ]);

        Task::create([
            'title' => 'Testes Unitários',
            'description' => 'Escrever testes para garantir que as unidades de código funcionem como esperado, aumentando a confiabilidade do software.',
            'status' => '1',
        ]);

        Task::create([
            'title' => 'Depuração (Debugging)',
            'description' => 'Identificar e corrigir erros ou "bugs" no código para garantir que o software funcione corretamente.',
            'status' => '1',
        ]);

        Task::create([
            'title' => 'Desenvolvimento de Interfaces de Usuário (UI)',
            'description' => 'Criar interfaces gráficas e interativas para que os usuários possam interagir com os sistemas de forma intuitiva.',
            'status' => '1',
        ]);

        Task::create([
            'title' => 'Integração Contínua',
            'description' => 'Implementar pipelines de integração contínua para automatizar testes e o deploy de código, garantindo que mudanças sejam rapidamente integradas ao projeto.',
            'status' => '1',
        ]);

        Task::create([
            'title' => 'Documentação de Código',
            'description' => 'Escrever documentação para explicar como o código funciona, suas funções e métodos, facilitando a manutenção futura.',
            'status' => '1',
        ]);

        Task::create([
            'title' => 'Análise de Requisitos',
            'description' => 'Compreender as necessidades do cliente ou do projeto e traduzi-las em requisitos técnicos que guiem o desenvolvimento.',
            'status' => '1',
        ]);

        Task::create([
            'title' => 'Desenvolvimento de API',
            'description' => 'Criar APIs (Interfaces de Programação de Aplicações) para permitir a integração entre diferentes sistemas ou serviços.',
            'status' => '1',
        ]);
    }
}
