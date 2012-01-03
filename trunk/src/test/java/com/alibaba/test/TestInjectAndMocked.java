package com.alibaba.test;

import org.testng.annotations.Test;
import java.util.Date;

import mockit.Mocked;

import org.jtester.annotations.AutoBeanInject;
import org.jtester.annotations.SpringApplicationContext;
import org.jtester.annotations.SpringBeanByName;
import org.jtester.testng.JTester;

import com.alibaba.jtester.bo.IUserBo;
import com.alibaba.jtester.vo.Users;
/**
 * JTesterӦ��ʾ��ϵͳ1:<br/>
 * ���һ�������ݿ����CRUD�Ĺ���<br/>
 * ��Ҫ���ܣ�<br/>
 * <li>ʵ��Spring��ע��</li>
 * <li>ʵ�ֽ�����Mocked</li>
 */
@SpringApplicationContext({"applicationContext.xml"})
@AutoBeanInject
public class TestInjectAndMocked extends JTester{

	@SpringBeanByName
	private IUserBo userBo;
	
	//@SpringBeanByName("userBo")
	@Mocked
	private IUserBo userBo2;
	
	/**
	 * ͨ��Springע��userBo
	 */
	@Test
	public void testAddUserByInject(){
		//��֤
		Users user = new Users();
		user.setUserId("test_1");
		user.setInviteUserId("test_2");
		user.setName("test");
		user.setTaoAccount("��������");
		user.setAlipayAccount("alipay_account@126.com");
		user.setPwd("111111");
		user.setSex((byte)1);
		user.setBirth(new Date());
		user.setCity("����");
		user.setProvince("�㽭");
		user.setEmail("test@126.com");
		user.setMobile("11111111111");
		user.setMoney(99f);
		user.setRegIp(2222222222222l);
		want.string(userBo.addUser(user)).isEqualTo("success");
	}
	
	/**
	 * ͨ��Mocked
	 */
	@Test
	public void tesstAddUserByMocked(){
		final Users user = new Users();
		//¼��
		new Expectations(){
			{
				userBo2.addUser(user);//������
				result = "mocked";//����ֵ
			}
		};
		//��֤
		
		want.string(userBo2.addUser(user)).isEqualTo("mocked");
	}
}
