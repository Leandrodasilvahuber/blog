<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'role' => 'Backend · IA',
                'illustration' => 'brain',
                'lead' => 'Sobre decisões de arquitetura em sistemas de IA',
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
                'tags' => ['#IA', '#Arquitetura'],
                'likes' => 214, 'comments' => 38, 'reposts' => 12,
                'top_reactor' => 'Marina Costa',
                'comment_name' => 'Rafael Souza', 'comment_role' => 'Eng. de Software',
                'comment_text' => 'Excelente ponto sobre acoplamento entre serviços. Vivi isso recentemente numa migração.',
                'published_at' => now()->subHours(2),
            ],
            [
                'role' => 'Infraestrutura',
                'illustration' => 'cloud',
                'lead' => 'Migrando cargas de trabalho para a nuvem',
                'body' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident sunt in culpa.',
                'tags' => ['#Cloud', '#DevOps'],
                'likes' => 156, 'comments' => 21, 'reposts' => 9,
                'top_reactor' => 'Bruno Alves',
                'comment_name' => 'Camila Nogueira', 'comment_role' => 'SRE',
                'comment_text' => 'Passamos por isso ano passado, o maior ganho foi na observabilidade.',
                'published_at' => now()->subHours(6),
            ],
            [
                'role' => 'Ferramentas',
                'illustration' => 'terminal',
                'lead' => 'Um pequeno hábito que mudou meu fluxo de trabalho',
                'body' => 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Curabitur pretium tincidunt lacus, ut interdum tellus elit sed risus.',
                'tags' => ['#Produtividade', '#CLI'],
                'likes' => 302, 'comments' => 47, 'reposts' => 26,
                'top_reactor' => 'Diego Martins',
                'comment_name' => 'Fernanda Lima', 'comment_role' => 'Product Engineer',
                'comment_text' => 'Comecei a fazer isso essa semana, já senti diferença no foco.',
                'published_at' => now()->subDay(),
            ],
            [
                'role' => 'Dados',
                'illustration' => 'graph',
                'lead' => 'O que os números não contam sobre performance',
                'body' => 'Nulla vitae elit libero, a pharetra augue. Vestibulum id ligula porta felis euismod semper. Donec ullamcorper nulla non metus auctor fringilla.',
                'tags' => ['#Dados', '#Performance'],
                'likes' => 178, 'comments' => 15, 'reposts' => 8,
                'top_reactor' => 'Aline Rocha',
                'comment_name' => 'Pedro Henrique', 'comment_role' => 'Data Engineer',
                'comment_text' => 'Concordo, métrica sem contexto vira vaidade.',
                'published_at' => now()->subDay()->subHours(10),
            ],
            [
                'role' => 'Open Source',
                'illustration' => 'branch',
                'lead' => 'Por que todo projeto deveria aceitar contribuições pequenas',
                'body' => 'Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Cras mattis consectetur purus sit amet fermentum. Maecenas faucibus mollis interdum.',
                'tags' => ['#OpenSource', '#Git'],
                'likes' => 265, 'comments' => 33, 'reposts' => 19,
                'top_reactor' => 'Juliana Prado',
                'comment_name' => 'Thiago Barros', 'comment_role' => 'Mantenedor OSS',
                'comment_text' => 'PRs pequenos também são a melhor forma de reter novos contribuidores.',
                'published_at' => now()->subDays(3),
            ],
            [
                'role' => 'Segurança',
                'illustration' => 'shield',
                'lead' => 'Segurança não é feature, é hábito',
                'body' => 'Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.',
                'tags' => ['#Segurança'],
                'likes' => 189, 'comments' => 24, 'reposts' => 11,
                'top_reactor' => 'Renata Dias',
                'comment_name' => 'Otávio Ferraz', 'comment_role' => 'AppSec',
                'comment_text' => 'Isso deveria estar em todo onboarding de time de engenharia.',
                'published_at' => now()->subDays(4),
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
    }
}
