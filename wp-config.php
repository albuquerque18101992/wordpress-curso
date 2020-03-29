<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'wordpress' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', 'root' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '`q9hr!rw+#Oop5I-56iTD+mpB0}`$eqvAVz-8xK^>`a=GYC}#&dJ1U_m|n7CFU6*' );
define( 'SECURE_AUTH_KEY',  '%6=$vMW6iM?r!y}^6O[wTe;l4GGUS0zwBg7,H,iPcV~Z?$3kKZZ#rW|1%Q7RsWf2' );
define( 'LOGGED_IN_KEY',    'Nc(G*meDiTw!/(Z~}P5mt.-_2_lf!LX#eYxQxoyEM&+B|[&E|(V2c^qy.z*Ci,_1' );
define( 'NONCE_KEY',        'U5c-uW@oWRh!obKKv[k+^DKooxR&:$VN|SS:(==c*;<4^NyM8be2Q<V+>.0V~aoe' );
define( 'AUTH_SALT',        'B?Ty,mR-2$4M>K?@4?J##l4qL@Q1Wdg d]aB!Y`jOlToH_QG}?ZyLyTWRKg`AB75' );
define( 'SECURE_AUTH_SALT', 'N$[_Ksez..cJF$L-[)D.NR&,b3/Yw1~@qw;3u_VNa,YP5NQ8v}>p}oa`RuE0AbF;' );
define( 'LOGGED_IN_SALT',   'L5O2K$0]_vLs,>w.@c=oEMZj|%k4Bgd0:a3#rrbKlkP>@c3nV%,MYG^3Gk}*Nj(#' );
define( 'NONCE_SALT',       'uBX+?~0S,C(*5N-RfvgX=SBI$[Vt7gXD[{xVtL1D]oJ:WI8vL14lPEwF|NLaV~{ ' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
