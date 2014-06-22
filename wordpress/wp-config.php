<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'renovar');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '419300al');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '|jlCQ>m!Dt/LXh2.+80&$-|CHq3!er(T|%_]y1h+n<d>3Q&<b8);Tl)nuD~.D-H5');
define('SECURE_AUTH_KEY',  'TtVu6_Ji0ADlUo1-37g)z^d!(F`-j5qtjd|E%CD><3Icq1|[%Oi*q_LHNo>o.Gh-');
define('LOGGED_IN_KEY',    '4o@dxWG@~C ;RBQKwauU^>@Mo;n~-#KYA-uHC#mTV+U2S<vJzF60[(gy50hAXX0n');
define('NONCE_KEY',        ',w+|-%%yeAMnznO<2s,EH!m|13,PVtDjuX]#|b9YK:)}i[jcgA#f/]%rX7|La3~U');
define('AUTH_SALT',        '/}FO]UX>:@}M<<Gy=S@j!&lZxw!L%5myuN(u.z4qq+yNs,4dYxGPQ{ykC-+TU)4-');
define('SECURE_AUTH_SALT', '7oCra:qc*Q ^hr>K#S}i0#;I3Uf!r!E$FY+dF8_x-LRXyt 2EFM+Ee.SF5765w!X');
define('LOGGED_IN_SALT',   '`1Ff>5%iP i8(rT?SV^Og`4#Az$C-DQ)P>_XJal6j.*Mk]~ i3_+%QYju_:{bl)-');
define('NONCE_SALT',       '&&0F+Do-,rn_eh@4a[+nz6JCK=6:5k4y+2|)B*%pBOR>[H/a08o^Ip|Lo/W(.mL)');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'vewfwebp9_';

/**
 * O idioma localizado do WordPress é o inglês por padrão.
 *
 * Altere esta definição para localizar o WordPress. Um arquivo MO correspondente ao
 * idioma escolhido deve ser instalado em wp-content/languages. Por exemplo, instale
 * pt_BR.mo em wp-content/languages e altere WPLANG para 'pt_BR' para habilitar o suporte
 * ao português do Brasil.
 */
define('WPLANG', 'pt_BR');

/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
